<?php

class ExpenseStorage {
    private $file;

    public function __construct(string $filePath) {
        $this->file = $filePath;

        if(!file_exists($this->file)){
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function load() : array {
        $content = file_get_contents($this->file);
        return json_decode($content, true);
    }

    public function save(array $data) : void {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }
}


?>