<?php
namespace App\Models;
use \PDO;
class Alert {
    public $bankid, $lastname, $firstname, $type, $accountnumber, $location, $description, $amount, $date, $remarks, $time, $documentnumber, $currentbalance, $accountbalance;

    public function __Construct($bankid = null ,$lastname = null, $firstname = null ,$type = null, $accountnumber = null, $amount = null , $time = null, $date = null, $location = null, $description = null, $remarks = null, $documentnumber = null, $accountbalance = null,$currentbalance = null){
        $this->bankid = $bankid;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->type = $type;
        $this->accountnumber = $accountnumber;
        $this->amount = $amount;
        $this->time = $time;
        $this->date = $date;
        $this->location = $location;
        $this->description = $description;
        $this->remarks = $remarks;
        $this->documentnumber = $documentnumber;
        $this->currentbalance = $currentbalance;
        $this->accountbalance = $accountbalance;
    }

    public static function getFromText($inputText, Bank $bank, PDO $pdo){
        // Returns an instance of the Alert Class after parsing from inputted text
        $alert2Process = new Alert();
        $alert2Process->type = setTransactionType($inputText);
        $inputArray = formatArray(parseTextToArray($inputText));
        $alert2Process->bankid = $bank->bankid;

        for ($index=0; $index < count($inputArray) ; $index++) {
          
           switch ($alert2Process->bankid) {
            case 1:
                parseGTBank($alert2Process, $inputArray, $index);
                
                break;
            case 2:
                parseWemaBank($alert2Process, $inputArray, $index);
                break;
            default:
                # code...
                break;
            }
            
            $bank->sameline == true ? parseGenericTagsSameLine($alert2Process, $bank, $inputArray, $index, $pdo) : parseGenericTagsNextLine($alert2Process, $bank, $inputArray, $index, $pdo);
            
        }
        $alert2Process->amount = (float) stripcommas($alert2Process->amount);
        return $alert2Process;
    }
}

 ////////////////////////////// HELPER METHODS ///////////////////////////////////////////////////////////////
    function parseTextToArray($inputText){
        // Recieves a string and parses each line into an array and returns
        return explode("<br />",  nl2br($inputText));
    }

    function formatArray($inputArray){
        // Removes empty lines from the array
        $inputArray = array_filter($inputArray, function($line){
            return !(trim($line) == "");
        });
        $inputArray = array_filter($inputArray, function($line){
            return !(trim($line) == ":");
        });
        return array_values($inputArray);
    }

    function parseGTBank(Alert &$alert2Process, $inputArray, $lineIndex){
        // Parses specific data of a GTBank alert into instance of an Alert Class 
        // Sets the Firstname and Lastname propertice
        if($alert2Process->firstname == null && $alert2Process->lastname == null){
            if(is_int(stripos($inputArray[$lineIndex], "Dear "))){
                $namearray = explode(",", str_replace("Dear ", "", $inputArray[$lineIndex]));
                $alert2Process->lastname = trim($namearray[0]);
                $alert2Process->firstname = trim($namearray[1]);
            }
        }
        // Sets the Current Balance property
        if($alert2Process->currentbalance == null){
            if(is_int(stripos($inputArray[$lineIndex], "Current Balance"))){
                $alert2Process->currentbalance = is_int(stripos($inputArray[$lineIndex + 1], ":")) ? (float) stripcommas(removeCurrency(trim(str_replace(":", "" ,$inputArray[$lineIndex + 1])), "Naira")) : (float) stripcommas(removeCurrency($inputArray[$lineIndex + 1], "Naira"));
            }
        }
        

        // Sets the Account Balance Property
        if($alert2Process->accountbalance == null){
            
            if(is_int(stripos($inputArray[$lineIndex], "Available Balance"))){
                $alert2Process->accountbalance = is_int(stripos($inputArray[$lineIndex + 1], ":")) ? (float) stripcommas(removeCurrency(trim(str_replace(":", "" ,$inputArray[$lineIndex + 1])), "Naira")) : (float) stripcommas(removeCurrency($inputArray[$lineIndex + 1], "Naira"));
            }
        }
    }

    function parseWemaBank(Alert &$alert2Process, $inputArray, $lineIndex){
        // Parses specific data of a Wema Bank alert into instance of an Alert Class 
        // Sets the Firstname and Lastname properties
        if($alert2Process->firstname == null && $alert2Process->lastname == null){
            if(is_int(stripos($inputArray[$lineIndex], "Dear"))){
                $namearray = explode(" ", str_replace("Dear ", "", $inputArray[$lineIndex]));
                $alert2Process->lastname = trim(array_pop($namearray));
                $alert2Process->firstname = trim(join(" ", $namearray));
            }
        }

        // Sets the Current Balance property 
        if($alert2Process->currentbalance == null){
            if(is_int(stripos($inputArray[$lineIndex], "Current Balance"))){
                $accountarray = explode(":", $inputArray[$lineIndex]);
                $alert2Process->currentbalance = trim($accountarray[2]);
                $alert2Process->currentbalance = (float) stripcommas(removeCurrency($alert2Process->currentbalance, "NGN"));
            }
        }

        // Sets the Date and Time Property
        if(is_int(stripos($inputArray[$lineIndex], "Transaction Date & Time"))){
                $datetimearray = explode(" ", $inputArray[$lineIndex + 1]);
                $alert2Process->date = trim($datetimearray[0]);
                $alert2Process->time = trim($datetimearray[1]);
        }

    }

    function parseGenericTagsSameLine(Alert &$alert2Process, Bank $bank, $inputArray, $lineIndex, PDO $pdo){
        error_log("New check");
        error_log("The line is: ". htmlentities($inputArray[$lineIndex]));
        $genericTagsArray = GenericTag::findAllByBankId($bank->bankid, $pdo);
        foreach($genericTagsArray as $genericTag){
            error_log("The Generic Tag is: $genericTag->alias");
            $key = trim($genericTag->name);
            if($alert2Process->$key == null){
                
                if(is_int(stripos($inputArray[$lineIndex], trim($genericTag->alias)))){
                    error_log("Outcome: TRUE");
                   $itemarray = explode(":", $inputArray[$lineIndex], 2);
                   if (count($itemarray) > 1){
                       $alert2Process->$key = trim($itemarray[1]);
                       
                   } 
               } else {
                   error_log("Outcome: FALSE");
               }
            }
           }
    }

    function parseGenericTagsNextLine(Alert &$alert2Process, Bank $bank, $inputArray, $lineIndex, PDO $pdo){
        $genericTagsArray = GenericTag::findAllByBankId($bank->bankid, $pdo);
        foreach($genericTagsArray as $genericTag){
            $key = $genericTag->name;
            if($alert2Process->$key == null){
                if(is_int(stripos($inputArray[$lineIndex], $genericTag->alias))){
                   $alert2Process->$key = trim($inputArray[$lineIndex + 1]);
                }
            }
        }
        
    }
    
    function setTransactionType($inputText){
        return is_int(stripos($inputText, "Debit")) ? "Debit" : "Credit";
    }

    function stripcommas($value){
        // Removes Commas in a String, to prepare a string for parsing to a numerical type
        return is_int(stripos($value, ",")) ? str_replace(",", "", $value) : $value;
    }

    function removeCurrency($value, $currencyName){
        return str_replace(" $currencyName", "", $value);
    }
    