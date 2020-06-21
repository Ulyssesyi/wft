<?php
namespace wft\pay;

class Response
{
    private $result;
    private $err_msg;
    private $data;

    public function __construct(bool $result, string $err_msg = '', $data=[])
    {
        $this->result = $result;
        $this->err_msg = $err_msg;
        $this->data = $data;
    }

    public function __toString()
    {
        $str = '请求结果为';
        if ($this->result) {
            $str .= '成功。返回数据为'. (is_string($this->data) ? $this->data : json_encode($this->data));
        } else {
            $str .= '失败。失败原因为'. $this->err_msg;
            if (!empty($this->data)) {
                $str .= '。返回数据为'. (is_string($this->data) ? $this->data : json_encode($this->data));
            }
        }
        return $str;
    }

    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getErrMsg(): string
    {
        return $this->err_msg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
