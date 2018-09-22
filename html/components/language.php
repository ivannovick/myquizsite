<?php
    class Language {
        var $lang2num = array(
            'php' => 1,
            'perl' => 2,
            'c' => 3,
            'cpp' => 4,
            'java' => 5,
            'python' => 6,
            'postgresql' => 7
        );

        var $lower2normalized = array(
            'php' => 'PHP',
            'perl' => 'Perl',
            'c' => 'C',
            'cpp' => 'C++',
            'java' => 'Java',
            'python' => 'Python',
            'postgresql' => 'PostgreSQL'
        );


        function get_name_from_url() {
            include('components/config.php');
            if ($language_override){
                return $language_override;
            }
            preg_match('/my(.*?)quiz\.com$/', $_SERVER['HTTP_HOST'], $matches);
            return $matches[1];
        }

        function get_num() {
            return $this->lang2num[$this->get_name_from_url()];
        }

        function get_normalized_name() {
            return $this->lower2normalized[$this->get_name_from_url()];
        }

        function get_name_by_num($num) {
            foreach ($this->lang2num as $key => $value) {
                if ($value == $num) return $key;
            }
        }
    }
?>
