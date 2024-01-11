<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiPrimaryKey {

    protected function setKeysForSaveQuery(Builder $query) {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    public function getKey()
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::getKey();
        }

        $pk = [];

        foreach($keys as $keyName){
            $pk[$keyName] = $this->getAttribute($keyName);
        }

        return $pk;
    }

    public function find($id, $columns = ['*'])
    {
        if (is_array($id) || $id instanceof Arrayable) {
            $out = null;
            foreach ($id as $key => $value) {
                //echo "{$key} => {$value} ";
                if ($out == null)
                {
                    $out = $this->where($key, $value);
                }
                else
                {
                    $out = $out->where($key, $value);
                }
            }

            return $out->first($columns);
        }

        return $this->whereKey($id)->first($columns);
    }

}