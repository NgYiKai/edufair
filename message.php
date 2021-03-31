<?php

/*-----------------------------*/
/*-----Connect to database-----*/
/*-----------------------------*/

$conn = mysqli_connect("localhost", "Wang", "YES", "education fair") or die("Database Error");

/*---------------------------------------*/
/*-----Get user message through ajax-----*/
/*---------------------------------------*/

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

/*-----------------------------*/
/*-----Detect user's input-----*/ 
/*-----------------------------*/

/*-----Detect emtpy user input-----*/

if(empty($getMesg)){
    echo 'Please type something';
    return 0;
}

/*-----Detect words from faq_location table-----*/

if(stripos($getMesg, "location") !== false){
    $getMesg = str_ireplace('text', 'text', "location"); 
    $check_data = "SELECT answer FROM faq_location WHERE alias LIKE '%$getMesg%'";
}




/*-----Detect words from faq_accomodation table-----*/




if(stripos($getMesg, "accomodation") !== false){
    $getMesg = str_ireplace('text', 'text', "accomodation"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "when can i check in") !== false){
    $getMesg = str_ireplace('text', 'text', "when_check_in"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "procedures") !== false){
    $getMesg = str_ireplace('text', 'text', "procedures"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "guaranteed") !== false){
    $getMesg = str_ireplace('text', 'text', "guaranteed"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "special needs") !== false){
    $getMesg = str_ireplace('text', 'text', "special_needs"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "not preferred") !== false){
    $getMesg = str_ireplace('text', 'text', "not_preferred"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "when offered") !== false){
    $getMesg = str_ireplace('text', 'text', "when_offered"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "pay accomodation") !== false){
    $getMesg = str_ireplace('text', 'text', "pay_accomodation"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "include") !== false){
    $getMesg = str_ireplace('text', 'text', "include"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "bring") !== false){
    $getMesg = str_ireplace('text', 'text', "bring"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "car") !== false){
    $getMesg = str_ireplace('text', 'text', "car"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "bill cycle") !== false){
    $getMesg = str_ireplace('text', 'text', "bill_cycle"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "stay during break") !== false){
    $getMesg = str_ireplace('text', 'text', "stay_break"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "family") !== false){
    $getMesg = str_ireplace('text', 'text', "family"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "distance") !== false){
    $getMesg = str_ireplace('text', 'text', "distance"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "move out") !== false){
    $getMesg = str_ireplace('text', 'text', "move_out"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "wifi") !== false){
    $getMesg = str_ireplace('text', 'text', "wifi"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "sponsored") !== false){
    $getMesg = str_ireplace('text', 'text', "sponsored"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "pay full") !== false){
    $getMesg = str_ireplace('text', 'text', "pay_full"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "gender") !== false){
    $getMesg = str_ireplace('text', 'text', "gender"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "no show") !== false){
    $getMesg = str_ireplace('text', 'text', "no show"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "visitor") !== false){
    $getMesg = str_ireplace('text', 'text', "visitor"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "details") !== false){
    $getMesg = str_ireplace('text', 'text', "details"); 
    $check_data = "SELECT answer FROM faq_accomodation WHERE alias LIKE '%$getMesg%'";
}




/*-----Detect words from faq_facilities table-----*/

if(stripos($getMesg, "facilities") !== false){
    $getMesg = str_ireplace('text', 'text', "facilities"); 
    $check_data = "SELECT answer FROM faq_facilities WHERE alias LIKE '%$getMesg%'";
}

/*-----Detect words from faq_exchange_opportunities table-----*/

if(stripos($getMesg, "exchange") !== false){
    $getMesg = str_ireplace('text', 'text', "exchange_opportunities"); 
    $check_data = "SELECT answer FROM faq_exchange_opportunities WHERE alias LIKE '%$getMesg%'";
}

/*-----Detect words from faq_scholarship table-----*/

if(stripos($getMesg, "scholarship") !== false){
    $getMesg = str_ireplace('text', 'text', "scholarships"); 
    $check_data = "SELECT answer FROM faq_scholarship WHERE alias LIKE '%$getMesg%'";
}

else if(stripos($getMesg, "hi") !== false || 
    stripos($getMesg, "hey") !== false ||
    stripos($getMesg, "hello") !== false){
    $getMesg = str_ireplace('text', 'text', "hi");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg%'";
}




/*-----Detect words from faq_intake table-----*/




if(stripos($getMesg, "apm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "apm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "teba intake") !== false){
    $getMesg = str_ireplace('text', 'text', "teba_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "tebe intake") !== false){
    $getMesg = str_ireplace('text', 'text', "tebe_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bef intake") !== false){
    $getMesg = str_ireplace('text', 'text', "bef_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "bem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eie intake") !== false){
    $getMesg = str_ireplace('text', 'text', "eie_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "eb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ellb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ellb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fam intake") !== false){
    $getMesg = str_ireplace('text', 'text', "fam_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ibm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ibm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ics intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ics_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsell intake") !== false){
    $getMesg = str_ireplace('text', 'text', "icsell_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsfts intake") !== false){
    $getMesg = str_ireplace('text', 'text', "icsfts_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icspa intake") !== false){
    $getMesg = str_ireplace('text', 'text', "icspa_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "la intake") !== false){
    $getMesg = str_ireplace('text', 'text', "la_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "irb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irf intake") !== false){
    $getMesg = str_ireplace('text', 'text', "irf_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irs intake") !== false){
    $getMesg = str_ireplace('text', 'text', "irs_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cebm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "cebm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ceee intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ceee_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvebm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "cvebm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eeebm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "eeebm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}
if(stripos($getMesg, "mmb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mmb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mnebm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mnebm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mte intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mte_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bs intake") !== false){
    $getMesg = str_ireplace('text', 'text', "bs_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bio intake") !== false){
    $getMesg = str_ireplace('text', 'text', "bio_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "csb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csai intake") !== false){
    $getMesg = str_ireplace('text', 'text', "csai_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "es intake") !== false){
    $getMesg = str_ireplace('text', 'text', "es_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "n intake") !== false){
    $getMesg = str_ireplace('text', 'text', "n_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "phs intake") !== false){
    $getMesg = str_ireplace('text', 'text', "phs_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pmp intake") !== false){
    $getMesg = str_ireplace('text', 'text', "pmp_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pcnb intake") !== false){
    $getMesg = str_ireplace('text', 'text', "pcnb_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "psy intake") !== false){
    $getMesg = str_ireplace('text', 'text', "psy_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "se intake") !== false){
    $getMesg = str_ireplace('text', 'text', "se_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bmm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "bmm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "cem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "cvem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ema intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ema_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "esiem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepc intake") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepc_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepd intake") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepd_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpc intake") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpc_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpd intake") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpd_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "elmm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpc intake") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpc_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpd intake") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpd_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ellm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ellm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "eem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fi intake") !== false){
    $getMesg = str_ireplace('text', 'text', "fi_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "idm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "idm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irm intake") !== false){
    $getMesg = str_ireplace('text', 'text', "irm_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "meee intake") !== false){
    $getMesg = str_ireplace('text', 'text', "meee_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mp intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mp_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mbaf intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mbaf_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mba intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mba_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mem intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mem_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mcc intake") !== false){
    $getMesg = str_ireplace('text', 'text', "mcc_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ohsl intake") !== false){
    $getMesg = str_ireplace('text', 'text', "ohsl_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pce intake") !== false){
    $getMesg = str_ireplace('text', 'text', "pce_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pgche intake") !== false){
    $getMesg = str_ireplace('text', 'text', "pgche_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pde intake") !== false){
    $getMesg = str_ireplace('text', 'text', "pde_intake");
    $check_data = "SELECT answer FROM faq_intake WHERE alias LIKE '%$getMesg'";
}




/*-----Detect words from faq_duaration table-----*/




if(stripos($getMesg, "foundation duration") !== false){
    $getMesg = str_ireplace('text', 'text', "duration_foundation"); 
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg%'";
}

if(stripos($getMesg, "apm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "apm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "teba duration") !== false){
    $getMesg = str_ireplace('text', 'text', "teba_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "tebe duration") !== false){
    $getMesg = str_ireplace('text', 'text', "tebe_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bef duration") !== false){
    $getMesg = str_ireplace('text', 'text', "bef_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "bem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eie duration") !== false){
    $getMesg = str_ireplace('text', 'text', "eie_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "eb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

//got error
if(stripos($getMesg, "engllb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "engllb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fam duration") !== false){
    $getMesg = str_ireplace('text', 'text', "fam_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ibm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ibm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ics duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ics_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsell duration") !== false){
    $getMesg = str_ireplace('text', 'text', "icsell_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsfts duration") !== false){
    $getMesg = str_ireplace('text', 'text', "icsfts_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icspa duration") !== false){
    $getMesg = str_ireplace('text', 'text', "icspa_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "la duration") !== false){
    $getMesg = str_ireplace('text', 'text', "la_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "irb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irf duration") !== false){
    $getMesg = str_ireplace('text', 'text', "irf_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irs duration") !== false){
    $getMesg = str_ireplace('text', 'text', "irs_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cebm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "cebm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ceee duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ceee_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvebm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "cvebm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eeebm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "eeebm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}
if(stripos($getMesg, "mmb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mmb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mnebm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mnebm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mte duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mte_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bs duration") !== false){
    $getMesg = str_ireplace('text', 'text', "bs_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bio duration") !== false){
    $getMesg = str_ireplace('text', 'text', "bio_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "csb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csai duration") !== false){
    $getMesg = str_ireplace('text', 'text', "csai_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "es duration") !== false){
    $getMesg = str_ireplace('text', 'text', "es_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "n duration") !== false){
    $getMesg = str_ireplace('text', 'text', "n_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "phs duration") !== false){
    $getMesg = str_ireplace('text', 'text', "phs_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pmp duration") !== false){
    $getMesg = str_ireplace('text', 'text', "pmp_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pcnb duration") !== false){
    $getMesg = str_ireplace('text', 'text', "pcnb_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "psy duration") !== false){
    $getMesg = str_ireplace('text', 'text', "psy_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "se duration") !== false){
    $getMesg = str_ireplace('text', 'text', "se_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bmm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "bmm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "cem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "cvem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ema duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ema_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "esiem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepc duration") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepc_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepd duration") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepd_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpc duration") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpc_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpd duration") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpd_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "elmm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpc duration") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpc_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpd duration") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpd_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ellm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ellm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "eem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fi duration") !== false){
    $getMesg = str_ireplace('text', 'text', "fi_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "idm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "idm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irm duration") !== false){
    $getMesg = str_ireplace('text', 'text', "irm_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "meee duration") !== false){
    $getMesg = str_ireplace('text', 'text', "meee_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mp duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mp_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mbaf duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mbaf_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mba duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mba_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mem duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mem_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mcc duration") !== false){
    $getMesg = str_ireplace('text', 'text', "mcc_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ohsl duration") !== false){
    $getMesg = str_ireplace('text', 'text', "ohsl_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pce duration") !== false){
    $getMesg = str_ireplace('text', 'text', "pce_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pgche duration") !== false){
    $getMesg = str_ireplace('text', 'text', "pgche_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pde duration") !== false){
    $getMesg = str_ireplace('text', 'text', "pde_duration");
    $check_data = "SELECT answer FROM faq_duration_of_programme WHERE alias LIKE '%$getMesg'";
}




/*-----Detect words from faq_fees table-----*/




if(stripos($getMesg, "apm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "apm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "teba fee") !== false){
    $getMesg = str_ireplace('text', 'text', "teba_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "tebe fee") !== false){
    $getMesg = str_ireplace('text', 'text', "tebe_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bef fee") !== false){
    $getMesg = str_ireplace('text', 'text', "bef_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "bem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eie fee") !== false){
    $getMesg = str_ireplace('text', 'text', "eie_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "eb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ellb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ellb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fam fee") !== false){
    $getMesg = str_ireplace('text', 'text', "fam_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ibm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ibm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ics fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ics_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsell fee") !== false){
    $getMesg = str_ireplace('text', 'text', "icsell_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icsfts fee") !== false){
    $getMesg = str_ireplace('text', 'text', "icsfts_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "icspa fee") !== false){
    $getMesg = str_ireplace('text', 'text', "icspa_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "la fee") !== false){
    $getMesg = str_ireplace('text', 'text', "la_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "irb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irf fee") !== false){
    $getMesg = str_ireplace('text', 'text', "irf_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irs fee") !== false){
    $getMesg = str_ireplace('text', 'text', "irs_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cebm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "cebm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ceee fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ceee_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvebm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "cvebm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eeebm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "eeebm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}
if(stripos($getMesg, "mmb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mmb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mnebm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mnebm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mte fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mte_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bs fee") !== false){
    $getMesg = str_ireplace('text', 'text', "bs_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bio fee") !== false){
    $getMesg = str_ireplace('text', 'text', "bio_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "csb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "csai fee") !== false){
    $getMesg = str_ireplace('text', 'text', "csai_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "es fee") !== false){
    $getMesg = str_ireplace('text', 'text', "es_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "n fee") !== false){
    $getMesg = str_ireplace('text', 'text', "n_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "phs fee") !== false){
    $getMesg = str_ireplace('text', 'text', "phs_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pmp fee") !== false){
    $getMesg = str_ireplace('text', 'text', "pmp_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pcnb fee") !== false){
    $getMesg = str_ireplace('text', 'text', "pcnb_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "psy fee") !== false){
    $getMesg = str_ireplace('text', 'text', "psy_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "se fee") !== false){
    $getMesg = str_ireplace('text', 'text', "se_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "bmm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "bmm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "cem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "cvem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "cvem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ema fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ema_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "esiem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepc fee") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepc_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "esiepd fee") !== false){
    $getMesg = str_ireplace('text', 'text', "esiepd_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpc fee") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpc_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "etesolpd fee") !== false){
    $getMesg = str_ireplace('text', 'text', "etesolpd_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "elmm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpc fee") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpc_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "elmpd fee") !== false){
    $getMesg = str_ireplace('text', 'text', "elmpd_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ellm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ellm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ecwm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ecwm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "eem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "eem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "fi fee") !== false){
    $getMesg = str_ireplace('text', 'text', "fi_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "idm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "idm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "irm fee") !== false){
    $getMesg = str_ireplace('text', 'text', "irm_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "meee fee") !== false){
    $getMesg = str_ireplace('text', 'text', "meee_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mp fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mp_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mbaf fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mbaf_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mba fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mba_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mem fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mem_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "mcc fee") !== false){
    $getMesg = str_ireplace('text', 'text', "mcc_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "ohsl fee") !== false){
    $getMesg = str_ireplace('text', 'text', "ohsl_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pce fee") !== false){
    $getMesg = str_ireplace('text', 'text', "pce_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pgche fee") !== false){
    $getMesg = str_ireplace('text', 'text', "pgche_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pde fee") !== false){
    $getMesg = str_ireplace('text', 'text', "pde_fee");
    $check_data = "SELECT answer FROM faq_fees WHERE alias LIKE '%$getMesg'";
}




/*-----Detect words from faq_general table-----*/




if(stripos($getMesg, "ranking") !== false){
    $getMesg = str_ireplace('text', 'text', "ranking");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "focus") !== false){
    $getMesg = str_ireplace('text', 'text', "focus");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "under 18") !== false){
    $getMesg = str_ireplace('text', 'text', "under_18");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "tuition fees") !== false){
    $getMesg = str_ireplace('text', 'text', "tuition_fees");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "exchange programme") !== false){
    $getMesg = str_ireplace('text', 'text', "exchange_programme");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "activities") !== false){
    $getMesg = str_ireplace('text', 'text', "activities");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "pay") !== false){
    $getMesg = str_ireplace('text', 'text', "pay");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "calendar") !== false){
    $getMesg = str_ireplace('text', 'text', "calendar");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "contact") !== false){
    $getMesg = str_ireplace('text', 'text', "contact");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "accomodation") !== false){
    $getMesg = str_ireplace('text', 'text', "accomodation");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "offer") !== false){
    $getMesg = str_ireplace('text', 'text', "offer");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "graduate") !== false){
    $getMesg = str_ireplace('text', 'text', "graduate");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "visit") !== false){
    $getMesg = str_ireplace('text', 'text', "visit");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "transport") !== false){
    $getMesg = str_ireplace('text', 'text', "transport");
    $check_data = "SELECT answer FROM faq_general WHERE alias LIKE '%$getMesg'";
}




/*-----Detect words from chatnot_questions table-----*/




if(stripos($getMesg, "courses") !== false){
    $getMesg = str_ireplace('text', 'text', "courses");
    $check_data = "SELECT answer FROM chatbot_questions WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "civil engineering") !== false){
    $getMesg = str_ireplace('text', 'text', "civil engineering");
    $check_data = "SELECT answer FROM chatbot_questions WHERE alias LIKE '%$getMesg'";
}

else if(stripos($getMesg, "engineering") !== false){
    $getMesg = str_ireplace('text', 'text', "engineering");
    $check_data = "SELECT answer FROM chatbot_questions WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "yes") !== false){
    $getMesg = str_ireplace('text', 'text', "yes");
    $check_data = "SELECT answer FROM chatbot_questions WHERE alias LIKE '%$getMesg'";
}

if(stripos($getMesg, "no") !== false){
    $getMesg = str_ireplace('text', 'text', "no");
    $check_data = "SELECT answer FROM chatbot_questions WHERE alias LIKE '%$getMesg'";
}

/*-----------------------*/
/*-----Run sql query-----*/
/*-----------------------*/

$run_query = @mysqli_query($conn, $check_data) or die("Sorry cannot understand");

/*------------------------------------------------------------------------*/
/*-----If query match, replay is shown otherwise show error statement-----*/
/*------------------------------------------------------------------------*/

if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['answer'];
    echo $replay;

    /*-----Show second message----*/

    if(stripos($getMesg, "location") !== false){
        $replay2 = "Would you like to know anything else?";
        echo "<br><br>";
        echo $replay2;
    }

    if(stripos($getMesg, "courses") !== false){
        $replay2 = "Arts and Social Sciences / Engineering";
        echo "<br><br>";
        echo $replay2;
    }

    if(stripos($getMesg, "civil engineering") !== false){
        $replay2 = "CVEBM intake / CVEBM duration / CVEBM fee";
        echo "<br><br>";
        echo $replay2;
    }

    else if(stripos($getMesg, "engineering") !== false){
        $replay2 = "Chemical and Environmental Engineering / Civil Engineering";
        echo "<br><br>";
        echo $replay2;
    }

}else{
    echo "Sorry cannot understand";
}
?>