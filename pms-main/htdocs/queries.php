<?php
//Select Group//
$SelectGroup="SELECT DISTINCT grp FROM base where exists (SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess)";
//Select Subgroup//
$quer="SELECT subgrp FROM base WHERE grp=:cat and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess) ";
//Get row count //

$row_count = "select count (*) from password_list where grp=:g and subgrp=:sb and exists  ( select grp,subgrp from base where password_list.grp=base.grp and password_list.subgrp=base.subgrp and exists (select subgroup from user_list where grp=:g and subgroup=:sb and email=:em) )";


?>