<ul class="product-prototype-options">
    @foreach($options as $option)
    <li class="option-type-field mb-2">
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" name="option_types[]" id="option_type_{{ $option->hash_key }}" value="{{ $option->hash_key }}" class="option-type" data-fouc>
          {{ $option->presentation }}
        </label>
      </div>
      <ul class="option-type-values">
        @foreach($option->values as $value)
            <li class="mt-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="option_values_hash[{{ $option->hash_key }}][]" id="option_value_{{ $value->hash_key }}" value="{{ $value->hash_key }}" class="option-value" data-fouc>
                  {{ $value->presentation }}
                </label>
              </div>
            </li>
        @endforeach
      </ul>
    </li>
    @endforeach
</ul>

<script type="text/javascript">
(function($){
  $('.option-type, .option-value').uniform();
  $("input.option-type").change(function() {
    $(this).parents("li").find("input.option-value").prop("checked", this.checked);
    $.uniform.update("input:checkbox");
  });
  $("input.option-value").change(function() {
    var any_checked = false;
    $(this).parents(".option-type-values").find("input.option-value").each(function(i, el) {
      any_checked = any_checked || el.checked;
    });
    $(this).parents(".option-type-field").find("input.option-type").prop("checked", any_checked);
    $.uniform.update("input:checkbox");
  });
})(jQuery);

</script>
