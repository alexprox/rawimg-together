<?php

namespace App;

class Locale {

    private $locale;
    private $locale_folder = 'Locale';
    private $config = '_Locale.php';
    private $text = array();
    private $loaded = false;

    public function __construct($core) {
        $config = $core->include_config($this->config);
        $this->locale = $config['locale'];
        $text_file = root() . '\\' . $core->config_folder() . '\\' . $this->locale_folder . '\\' . $this->locale . '.php';
        if (file_exists($text_file))
            $this->text = include($text_file);
        else
            throw new \Exception('File "' . $text_file . '" not found');
        $this->loaded = true;
    }

    public function js_function() {
        $function = 'function txt(c){var text = {';
        foreach ($this->text as $code => $translate)
            $function .= '"' . $code . '":' . '"' . $translate . '",';
        return $function . '};if(text[c] !== undefined)return text[c];else return c;}';
    }

    public function txt($code) {
        if (!$this->loaded)
            throw new \Exception('Locale file is not loaded!');
        if (isset($this->text[$code])) {
            return $this->text[$code];
        }
        return $code;
    }

}
