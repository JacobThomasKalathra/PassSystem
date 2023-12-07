<?php
include ("session.php");

    $to = $login_session;
    

    $organizer          = '$login_session';
    $organizer_email    = '$login_session';

    $participant_name_1 = 'Bhavesh';
    $participant_email_1= 'bhavesh.kumar@oracle.com';

  

    $location           = "Office";
    $date               = '20161028';
    $startTime          = '8:30';
    $endTime            = '9:30';
    $subject            = 'DEVCC Schedule';
    $desc               = 'The purpose of the meeting is to automize EOTD schedule';

    $headers = 'Content-Type:text/calendar; Content-Disposition: inline; charset=utf-8;\r\n';
	    $message = "BEGIN:VCALENDAR

METHOD:REQUEST
PRODID:EOTD Schedule
BEGIN:VEVENT
SUBJECT:".$subject."\r\n
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z\r\n
DTSTART:".$date."T".$startTime."00Z\r\n
DTEND:".$date."T".$endTime."00Z\r\n
ORGANIZER;CN=nirmal.chandrasekar@oracle.com:MAILTO:nirmal.chandrasekar@oracle.com
LOCATION:".$location."\r\n

UID:63118
BEGIN:VALARM
ACTION:Display
END:VTIMEZONE
END:VCALENDAR";
    
    mail($to, $subject, $message, $headers);    
?>