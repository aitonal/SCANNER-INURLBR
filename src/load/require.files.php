<?php


################################################################################
#FUNCTIONS #####################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/helper.func.php";

################################################################################
#PRINT MESSAGE AND OUT OF THE PROCESS###########################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/get_out.func.php";

################################################################################
#GET COLORS TERMINAL############################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/get_color.func.php"; 

################################################################################
#MENU###########################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/menu.func.php";

################################################################################
#MENU INFO######################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/menu_info.func.php";

################################################################################
#BANNER HOME####################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/banner_logo.func.php";

################################################################################
#DEBUGAR VALORES E PROCESSOS####################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/debug.func.php";

################################################################################
#BEEP ##########################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/cli_beep.func.php";


################################################################################
#IRC CONECTION##################################################################
#IRC SEND MSG###################################################################
#IRC PING PONG##################################################################
#IRC QUIT#######################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/irc.func.php";

################################################################################
#UPDATE SCRIPT##################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/update_script.func.php";

################################################################################
#CHANGE PROXY FUNCTION IN TIME##################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/time_proxy.func.php";

################################################################################
#SETUP TO RUN COMMANDS IN ID####################################################
#LIST COMMANDS FILE exploits.conf###############################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/config_exploit_conf.func.php";

################################################################################
#INSERT VALUES COMMANDS FILE exploits.conf######################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/config_exploit_add.func.php";

################################################################################
#REPLACE THE SECURITIES URL#####################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/replace.func.php";

################################################################################
#SAVE URL VULNERABLE  COMMAND ECHO >> FILE######################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/save_value.func.php"; 

################################################################################
#RENEW IP NETWORK TOR###########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/renew_tor.func.php";

################################################################################
#This function will validate emails#############################################
#This function will validate URLS###############################################
################################################################################
#require_once "{$_SESSION['config']['pwd']}/../functions/validate_url_email.func.php";

################################################################################
#This function will filter custom values########################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/extract_reg_custom.func.php";

################################################################################
#This function will filter and mail each url####################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/filter_email_if.func.php";

################################################################################
#This function extract emails###################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/extract_email.func.php";

################################################################################
#This function will filter urls each url########################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/extract_url.func.php";

################################################################################
#Esta função irá formatar salvar urls concatenadas##############################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/check_urls.func.php";

################################################################################
#FORMATTING POST################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/convert_url_query.func.php";

################################################################################
#OPEN FILE BASE FOR VALIDATION##################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/open_file.func.php";

################################################################################
#CATCH INFORMATION IP###########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/info_ip.func.php";

################################################################################
#CAPTURE URL POSITION IN BROWSER ALEXA / RELEVANCE OF SUCH URL##################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/position_alexa.func.php";

################################################################################
#GENERATE URL REFERENCE random##################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/url_ref_rand.func.php";

################################################################################
#GENERATE AGENT BROWSER random##################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/useragent_rand.func.php";

################################################################################
#RESPONSIBLE FOR RUN COMMANDS IN TERMINAL#######################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/exec_command.func.php";

################################################################################
#RESPONSIBLE FOR ALL REQUESTS GET / POST THE SCRIPT#############################
################################################################################
# curl_multi_init — Returns a new cURL multi handle#############################
# (PHP 5) http://php.net/manual/en/function.curl-multi-init.php#################
require_once "{$_SESSION['config']['pwd']}/../functions/request_info.func.php";

################################################################################
#CAPTURE INFORMATION SERVER AND VALIDATE FAULTS#################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/infoserver.func.php";

################################################################################
#ERROR MAIN PROCESS RESPONSIBLE FOR ALL VALIDATION OF MOTOR#####################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/process_url_exec.func.php";

################################################################################
#ERROR MAIN PROCESS RESPONSIBLE FOR ALL VALIDATION OF ENGINE####################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/process.func.php";

################################################################################
#ERRORS STANDARDS OF SCRIPT VALIDATE WITH HTML RECEIVED#########################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/checker_error.func.php";

################################################################################
#FORMAT URL#####################################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/mount_url_exploit.func.php";

################################################################################
#FILTER HTML URLs ALL THE RETURN OF seekers#####################################
#FILTER HTML URLs ALL THE RETURN OF GOOGLE API##################################
#FILTER IF URL DOMAIN###########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/filter_url.func.php";

################################################################################
#Filtering the repeated emails #################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/filter_email_repeated.func.php";

################################################################################
#COUNTING PROCESS END URLS / vuln AND SHOWING THE URLS / vuln###################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/exit_process.func.php";

################################################################################
#CASE URLS FILTER AND VALIDATING URL VALID######################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/sub_process.func.php";

################################################################################
#TIME TO PROCESS SEC############################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/timesec.func.php";

################################################################################
#SEARCH ENGINE CONFIGURATION####################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/page_engine.func.php";

################################################################################
#SUB PROCESS INJECT VALUES######################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/sub_exec_exploit.func.php";

################################################################################
#SEND VALUES EMAIL##############################################################
################################################################################
# (PHP 4, PHP 5) mail — Send mailhttp://php.net/manual/en/function.mail.php
require_once "{$_SESSION['config']['pwd']}/../functions/sendmail.func.php";

################################################################################
#HOST GOOGLE RANDOM#############################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/domain_rand_google.func.php";

################################################################################
#PROXY HTTP BASE FILE###########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/proxy_rand_http.func.php";

################################################################################
#ACESSING FILE ROBOTS###########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/robots.func.php";

################################################################################
#GENERATE RANDOM DORKS##########################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/random_dork.func.php";

################################################################################
#VALIDATING OPEN DOORS##########################################################
################################################################################
#(PHP 4, PHP 5) fsockopen — Open Internet or Unix domain socket connection
#http://php.net/manual/en/function.fsockopen.php
#WRITING ON THE DOOR############################################################
################################################################################
#(PHP 4, PHP 5) fwrite — Binary-safe file write
#http://php.net/manual/pt_BR/function.fwrite.php
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/port.func.php";

################################################################################
#CODE SEARCH ENGINES############################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/engines.func.php";

################################################################################
#INITIAL INFORMATION############################################################
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/start_banner.func.php";

################################################################################
#RUN WITH SEARCH ENGINES########################################################
################################################################################
# (PHP 4 >= 4.0.1, PHP 5) create_function — Create an anonymous (lambda-style)## 
# function http://php.net/manual/en/function.create-function.php################
################################################################################


################################################################################
#This function will send the contents of the output buffer (if any)#############
################################################################################
require_once "{$_SESSION['config']['pwd']}/../functions/main.func.php";