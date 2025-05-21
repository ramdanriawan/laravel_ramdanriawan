<?php

namespace App\Helpers;

class Helper
{
    private $headers = [];

    public function setHeadersByResult($curlExecResult)
    {
        $stringDataArray = explode("\r\n", $curlExecResult);

        $newStringDataArray = [];

        foreach ($stringDataArray as $itemStringDataArray) {
            if(strpos($itemStringDataArray, "<!DOCTYPE") > -1) {
                break;
            }

            $newStringDataArray[] = $itemStringDataArray;
        }

        $this->headers = $newStringDataArray;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getHeaderValue($name, $keyName)
    {
        foreach ($this->headers as $header) {
            if (strpos($header, $name) > -1) {

                $headerValue = explode(": ", $header)[1];

                $headerData = explode("; ", $headerValue);

                foreach ($headerData as $headerDataItem) {
                    if (strpos($headerDataItem, $keyName) > -1) {
                        $dataKeyAndDataValueByKeyName = explode("=", $headerDataItem);

                        return $dataKeyAndDataValueByKeyName[1];
                    }
                }
            }
        }
    }
}
