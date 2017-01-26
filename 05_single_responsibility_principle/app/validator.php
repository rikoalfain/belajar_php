<?php
<?php
class Validator
{
    private $errors = array();
    public function validate(array $data, array $rules)
    {
        $valid = true;
        foreach ($rules as $item => $ruleset) {
            $ruleset = explode('|', $ruleset);
            foreach ($ruleset as $rule) {
                $pos = strpos($rule, ':');
                if ($pos != false) {
                    $parameter = substr($rule, $pos + 1);
                    $rule = substr($rule, 0, $pos);
                } else {
                    $parameter = '';
                }
                /**
                 * [$methodName description]
                 * variable methodName akan memiliki value validateRule misal rulenya email = validateEmail.
                 */
                $methodName = 'validate'.ucfirst($rule);
                /**
                 * [$value description]
                 * variable value kita set value datanya dari $data[$item] jika memang ada, jika tidak ada maka default valuenya = NULL.
                 */
                $value = isset($data[$item]) ? $data[$item] : null;
                /*
                 * fungsi untuk mengecek apakah method yang kita definisikan itu ada dalam Class ini, jika ada
                 */
                if (method_exists($this, $methodName)) {
                    $this->$methodName($item, $value, $parameter) or $valid = false;
                }
            }
        }
        return $valid;
    }
    /**
     * [getErrors description]
     * method untuk menampilkan errors validation.
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * [validateRequired description]
     * Method untuk validasi required field.
     *
     * @param [type] $item      [description]
     * @param [type] $value     [description]
     * @param [type] $parameter [description]
     *
     * @return [boolean] [description]
     */
    private function validateRequired($item, $value, $parameter)
    {
        if ($value === '' || $value === null) {
            $this->errors[$item][] = 'The '.$item.' field is required';
            return false;
        }
        return true;
    }
    /**
     * [validateEmail description]
     * Method untuk mengecek validasi email valid.
     *
     * @param [type] $item      [description]
     * @param [type] $value     [description]
     * @param [type] $parameter [description]
     *
     * @return [boolean] [description]
     */
    private function validateEmail($item, $value, $parameter)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$item][] = 'The '.$item.' field should be a valid email address';
            return false;
        }
        return true;
    }
    /**
     * [validateMin description]
     * Method untuk mengecek Minimum character dari sebuah field.
     *
     * @param [type] $item      [description]
     * @param [type] $value     [description]
     * @param [type] $parameter [description]
     *
     * @return [boolean] [description]
     */
    private function validateMin($item, $value, $parameter)
    {
        if (strlen($value) >= $parameter == false) {
            $this->errors[$item][] = 'The '.$item.' field should have a minimum lenght of '.$parameter;
            return false;
        }
        return true;
    }
}

?>