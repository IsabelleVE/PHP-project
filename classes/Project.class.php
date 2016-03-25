<?php
class User{
    private $m_sFullName;
    private $m_sEmail;
    private $m_sUserName;
    private $m_sPassword;

    // s = string en v = vanalles en i = int

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty){
            case "FullName":
                if(!empty($p_vValue)){
                    $this->m_sFullName = $p_vValue;
                }else{
                    throw new Exception("Firstname cannot be empty.");
                }
                break;
            case "LastName":
                $this->m_sLastName = $p_vValue;
                break;
            case "Email":
                $this->m_sEmail = $p_vValue;
                break;
            case "UserName":
                $this->m_sUserName= $p_vValue;
                break;
            case "Password":
                $this->m_sPassword = $p_vValue;
                break;
        }
    }

   /* private function canbook(){
        // als checkinmonth < checkoutmonth
        // als checkinmonth == checkoutmonth + checkinday < checkouday
        if($this->m_iCheckInMonth < $this->m_iCheckOutMonth
            || ($this->m_iCheckInMonth == $this->m_iCheckOutMonth && $this->m_iCheckInDay < $this->m_iCheckOutDay))
        {return true;
        } else{
            return false;
        }
    }


    public function __get($p_sProperty)
    {
        switch($p_sProperty){
            case "FirstName":
                return $this->m_sFirstName;
                break;
            case "LastName":
                return $this->m_sLastName;
                break;
            case "CheckInDay":
                return $this->m_iCheckInDay;
                break;
            case "Hotel":
                return $this->m_sHotel;
                break;
            case "CheckInMonth":
                return $this->m_iCheckInMonth;
                break;
            case "CheckOutDay":
                return $this->m_iCheckOutDay;
                break;
            case "CheckOutMonth":
                return $this->m_iCheckOutMonth;
                break;
        }
    }

    public function Save(){

        if(! $this->canbook()){
            throw new Exception("Checkin must be before checkout.");
        }
        $conn = new PDO("mysql:host=localhost;dbname=imd","root","root");
        $statement = $conn->prepare("INSERT INTO tblhotelbookings
                            (
                            booking_first_name,
                            booking_last_name,
                            booking_from_day,
                            booking_from_month,
                            booking_to_day,
                            booking_to_month,
                            booking_hotel
                            )
                            VALUES
                            (
                            :firstname,
                            :lastname,
                            :ckechinday,
                            :checkinmonth,
                            :checkoutday,
                            :checkoutmonth,
                            :hotel
                            )
                            ");
        $statement->bindValue(":firstname",$this->FirstName);
        $statement->bindValue(":lastname",$this->LastName);
        $statement->bindValue(":checkinday",$this->CheckInDay);
        $statement->bindValue(":checkinmonth",$this->CheckInMonth);
        $statement->bindValue(":checkoutday",$this->CheckOutDay);
        $statement->bindValue(":checkoutmonth",$this->CheckOutMonth);
        $statement->bindValue(":hotel",$this->Hotel);
        return $statement->execute();

    }*/
}
