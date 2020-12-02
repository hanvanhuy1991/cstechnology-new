<?php


namespace App\Presenters\Traits;

trait TimestampsTrait
{
    public function createdAt()
    {
        return $this->wrappedObject->created_at;
    }

    public function updatedAt()
    {
        return $this->wrappedObject->updated_at;
    }

    public function deletedAt()
    {
        return $this->wrappedObject->deleted_at;
    }
}
