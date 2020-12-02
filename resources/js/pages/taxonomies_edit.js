$.jstree.defaults.core.themes.variant = "large";
$('#taxonomy-tree').jstree({
    'core' : {
        "check_callback" : true,
        'data' : {
            "url" : function(node) {
                return node.id === '#'
                    ? adminTaxonomyPath : adminTaxonomyPath.replace('jstree', 'taxon') + '/' +  node.id + '/jstree'
            },
        },

    },
    "plugins" : ['contextmenu', 'dnd', 'types'],
    "types": {
        "default": {
            "icon": "icon-folder-open icon-md"
        }
    },
    "contextmenu": {
        items: function ($node) {
            var tree = $('#taxonomy-tree').jstree(true);
            return {
                create: {
                    label: '<i class="icon-plus3 mr-2"></i>Create',
                    action: function (node) {
                        $node = tree.create_node($node, { text: 'New', type: 'default' });
                        tree.edit($node);
                    },
                    separator_after: false,
                    separator_before: false
                },
                rename: {
                    label: '<i class="icon icon-pencil mr-2"></i> ' + 'Rename',
                    action: function (obj) {
                        tree.edit($node);
                    },
                    separator_after: false,
                    separator_before: false
                },
                remove: {
                    label: '<i class="icon icon-trash mr-2"></i> ' + 'Remove',
                    action: function (obj) {
                        return tree.delete_node($node)
                    },
                    separator_after: false,
                    separator_before: false
                },
                edit: {
                    label: '<i class="icon-cog mr-2"></i> ' + 'Edit',
                    action: function (obj) {
                        window.location = adminUrl('taxons/' + $node.id + '/edit');
                        return window.location
                    },
                    separator_after: false,
                    separator_before: false
                }
            }
        }
    },
})
    .on('loaded.jstree', function(e, data) {
        $("#taxonomy-tree").jstree("select_node", "ul > li:first");
        let Selectednode = $("#taxonomy-tree").jstree("get_selected");
        $("#taxonomy-tree").jstree("open_node", Selectednode, false, true);
    })
    .on('delete_node.jstree', function (e, data) {
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: adminUrl('taxons/' + data.node.id),
        })
            .fail(function () {
                data.instance.refresh();
            });
    })
    .on('create_node.jstree', function (e, data) {
        let name = data.node.text;
        let position = data.position;
        let parent_id = data.node.parent;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: adminUrl('taxons'),
            data: {
                name: name,
                position: position,
                parent_id: parent_id,
            }
        }).done(function (d) {
            data.instance.set_id(data.node, d.id);
        }).fail(function () {
            data.instance.refresh();
        });
    })
    .on('rename_node.jstree', function (e, data) {
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            url: adminUrl('taxons/' + data.node.id),
            data: {
                name: data.text,
            }
        }).fail(function () {
            data.instance.refresh();
        });
    })
    .on('move_node.jstree', function (e, data) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: adminUrl('taxons/' + data.node.id + '/sort'),
            data: {
                parent_id: data.node.parent,
                position: data.position
            }
        }).fail(function () {
            data.instance.refresh();
        });
    });
