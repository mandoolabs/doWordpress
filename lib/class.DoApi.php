<?php
	/*
	* 2012 Mandoo
	*
	* NOTICE OF LICENSE
	* This source file is subject to the Open Software License (OSL 3.0)
	* that is bundled with this package in the file LICENSE.txt.
	* It is also available through the world-wide-web at this URL:
	* http://opensource.org/licenses/osl-3.0.php
	* If you did not receive a copy of the license and are unable to
	* obtain it through the world-wide-web, please send an email
	* to license@mandoocms.com so we can send you a copy immediately.
	*
	* DISCLAIMER
	* Do not edit or add to this file if you wish to upgrade this file to newer
	* versions in the future
	*
	*  @author Mandoo Team <help@mandoocms.com>
	*  @copyright  2012 Mandoo
	*  @version  Release: $Revision: 2532 $
	*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
	*  International Registered Trademark & Property of Global Mandoo SL
	*/
	class DoAPI
	{
		/***************************************************************************/
		/*								fields								 	 */
		/***************************************************************************/
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $clientId 			= "";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $clientSecret 		= "";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $params 			=  "";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $responseFormat 	= "xml";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $method 			= "";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $httpmethod 		= "GET";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $version 			= "1";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		// private $apiurl 			= "http://api.comandoo.com";
		private $apiurl 			= "http://api.mandoocms.com";
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $includeoutheader 	= false;
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		private $output				= null;
		/***************************************************************************/
		/*								properthies							 	 */
		/***************************************************************************/
		public function get_params()			{return $this->params;}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function get_responseFormat()	{return $this->responseFormat;}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function get_method()			{return $this->method;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function get_output()			{return $this->output;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function get_apiUrl()			{return $this->apiurl;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_params($params)		{$this->params 			= $params;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_responseFormat($responseFormat)	{$this->responseFormat 	= $responseFormat;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_method($method)			{$this->method 			= $method;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_httpmethod($httpmethod)			{$this->httpmethod 			= $httpmethod;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_apiUrl($apiurl)			{$this->apiurl			= $apiurl;}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function set_outputheader($includeoutheader) {$this->includeoutheader = $includeoutheader; }
		/***************************************************************************/
		/*								constructor							 	 */
		/***************************************************************************/
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function __construct($clientId, $clientSecret)
		{
			if(empty($clientId) || empty($clientSecret))
			{
				return null;
			}
			$this->clientId			= $clientId;
			$this->clientSecret		= $clientSecret;
			$this->apiurl 			= $this->apiurl . "/v" . $this->version . "/";
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function __destruct(){}
		/***************************************************************************/
		/*								doMail								 	 */
		/***************************************************************************/
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_Groups($ids = null)
		{
			$params = "ids=0";
			if (isset($ids) && $ids != null && $ids != "" && $ids != 0) {
				$params = "ids=" . $ids;
			}
			$this->method = "doMail_Groups";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_Group_Subscribers($ids = null)
		{
			$params = "ids=0";
			if (isset($ids) && $ids != null && $ids != "" && $ids != 0) {
				$params = "ids=" . $ids;
			}
			$this->method = "doMail_Group_Subscribers";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_AddGroup($title = "")
		{
			$params = "title=";
			if (isset($title) && $title != null && $title != "") {
				$params = "title=" . rawurlencode($title);
			}
			$this->method = "doMail_AddGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_UpdateGroup($id, $title = "")
		{
			$params = "title=";
			if (isset($title) && $title != null && $title != "") {
				$params = "title=" . $title;
			}
			if (isset($id) && $id != null && $id != "") {
				$params .= "&id=" . $id;
			}
			$this->method = "doMail_UpdateGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_DeleteGroup($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method = "doMail_DeleteGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_AddSubscriber($email)
		{
			if (isset($email) && $email != null && $email != "") {
				$params = "email=" . rawurlencode($email);
			}
			$this->method 		= "doMail_AddSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_AddSubscriberReturnId($email)
		{
			if (isset($email) && $email != null && $email != "") {
				$params = "email=" . rawurlencode($email);
			}
			$this->method 		= "doMail_AddSubscriberReturnId";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_IsSubscriber($email)
		{
			if (isset($email) && $email != null && $email != "") {
				$params = "email=" . rawurlencode($email);
			}
			$this->method 		= "doMail_IsSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_GetSubscriber($id, $email)
		{
			$params = "1=1";
			if (isset($id) && $id != null && $id != "") {
				$params .= "&id=" . $id;
			}
			if (isset($email) && $email != null && $email != "") {
				$params .= "&email=" . rawurlencode($email);
			}
			$this->method 		= "doMail_GetSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_DeleteSubscriber($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method 		= "doMail_DeleteSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_DeleteSubscriberEmail($email)
		{
			if (isset($email) && $email != null && $email != "") {
				$params = "email=" . rawurlencode($email);
			}
			$this->method 		= "doMail_DeleteSubscriberEmail";

			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_AddSubscriberToGroup($id, $users)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			if (isset($users) && $users != null && $users != "") {
				$params .= "&users=" . $users;
			}
			$this->method 		= "doMail_AddSubscriberToGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_RemoveSubscriberToGroup($id, $users)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			if (isset($users) && $users != null && $users != "") {
				$params .= "&users=" . $users;
			}
			$this->method 		= "doMail_RemoveSubscriberToGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_SendNewsletter($campaignId, $groups, $subject, $html, $plaintext, $publishOnRss, $googleAnalyticsId)
		{
			if (isset($campaignId) && $campaignId != null && $campaignId != "") {
				$params = "campaignId=" . $campaignId;
			}
			if (isset($groups) && $groups != null && $groups != "") {
				$params .= "&groups=" . $groups;
			}
			if (isset($subject) && $subject != null && $subject != "") {
				$params .= "&subject=" . rawurlencode($subject);
			}
			if (isset($html) && $html != null && $html != "") {
				$params .= "&html=" . rawurlencode($html);
			}
			if (isset($plaintext) && $plaintext != null && $plaintext != "") {
				$params .= "&plaintext=" . rawurlencode($plaintext);
			}
			if (isset($publishOnRss) && $publishOnRss != null && $publishOnRss != "") {
				$params .= "&publishOnRss=" . $publishOnRss;
			}
			if (isset($googleAnalyticsId) && $googleAnalyticsId != null) {
				$params .= "&googleAnalyticsId=" . $googleAnalyticsId;
			}

			$this->method 		= "doMail_SendNewsletter";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_SendNewsletterToSubscriber($campaignId, $subscriber, $subject, $html, $plaintext, $publishOnRss, $googleAnalyticsId)
		{
			if (isset($campaignId) && $campaignId != null && $campaignId != "") {
				$params = "campaignId=" . $campaignId;
			}
			if (isset($subscriber) && $subscriber != null && $subscriber != "") {
				$params .= "&subscriber=" . rawurlencode($subscriber);
			}
			if (isset($subject) && $subject != null && $subject != "") {
				$params .= "&subject=" . rawurlencode($subject);
			}
			if (isset($html) && $html != null && $html != "") {
				$params .= "&html=" . rawurlencode($html);
			}
			if (isset($plaintext) && $plaintext != null && $plaintext != "") {
				$params .= "&plaintext=" . rawurlencode($plaintext);
			}
			if (isset($publishOnRss) && $publishOnRss != null && $publishOnRss != "") {
				$params .= "&publishOnRss=" . $publishOnRss;
			}
			if (isset($googleAnalyticsId) && $googleAnalyticsId != null) {
				$params .= "&googleAnalyticsId=" . $googleAnalyticsId;
			}

			$this->method 		= "doMail_SendNewsletterToSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_AddCampaign($name)
		{
			if (isset($name) && $name != null && $name != "") {
				$params = "name=" . rawurlencode($name);
			}
			$this->method = "doMail_AddCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_DeleteCampaign($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method = "doMail_DeleteCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doMail
			* @package  doMail
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doMail_GetCampaign($id)
		{
			if (isset($id)) {
				$params = "id=" . $id;
			}
			$this->method = "doMail_GetCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/***************************************************************************/
		/*								doForms									 */
		/***************************************************************************/
		public function doforms_GetNumForms()
		{
			$params = "";
			$this->method = "doforms_GetNumForms";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doforms_GetNumReports()
		{
			$params = "";
			$this->method = "doforms_GetNumReports";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetLastReports($limit = 1)
		{
			$params = "limit=" . $limit;
			$this->method = "doforms_GetLastReports";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doforms_GetForms($init = 0, $end  = 0)
		{
			$params = "init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doforms_GetForms";
			return $this->Call_Mandoo_Api_V1($params);
		}

		/*UP CHECKED && down to check*/
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetFormsWithNewsletterSubscribe($init = 0, $end  = 0)
		{
			$params = "init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doforms_GetFormsWithNewsletterSubscribe";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get a form by Identifier
			* @param int id
			* @return  Array with forms
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetForm($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_GetForm";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Extract only the forms with a date field
			* @param int init Down limit of row
			* @param int end Up limit of row
			* @return  Array with forms
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetFormsWithDateField($init = 0, $end = 0)
		{
			$params = "init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doforms_GetFormsWithDateField";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get a form by Identifier
			* @param int id
			* @return  Array with forms
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetFieldsOfForm($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_GetFieldsOfForm";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get a form data
			* @param int id of form
			* @param string field
			* @return  Array with forms
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_GetDataOfForm($id = 0, $field = "")
		{
			$params = "id=" . $id;
			$params .= "&field=" . $field;
			$this->method = "doforms_GetDataOfForm";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_UpdateForm($accountid, $formid, $name = -1, $description = -1, $userId = -1, $content = -1, $type = -1, $url = -1, $urlLogo = -1, $urlMessage = -1, $urlBack = -1, $urlStyle = -1, $messagedescription = -1, $messageStyle = -1, $emails = -1, $followUp = -1, $deleted = -1, $style = -1, $canRepeatData = -1, $history = -1, $sourceform = -1, $urlok = -1, $urlko = -1, $confirmationTemplate = -1, $active = -1, $isdefault = -1)
		{
			$params = "accountid=" . $accountid;
			$params .= "&formid=" . $formid;
			$params .= "&name=" . $name;
			$params .= "&description=" . $description;
			$params .= "&userId=" . $userId;
			$params .= "&content=" . $content;
			$params .= "&type=" . $type;
			$params .= "&url=" . $url;
			$params .= "&urlLogo=" . $urlLogo;
			$params .= "&urlMessage=" . $urlMessage;
			$params .= "&urlBack=" . $urlBack;
			$params .= "&urlStyle=" . $urlStyle;
			$params .= "&messagedescription=" . $messagedescription;
			$params .= "&messageStyle=" . $messageStyle;
			$params .= "&emails=" . $emails;
			$params .= "&followUp=" . $followUp;
			$params .= "&deleted=" . $deleted;
			$params .= "&style=" . $style;
			$params .= "&canRepeatData=" . $canRepeatData;
			$params .= "&history=" . $history;
			$params .= "&sourceform=" . $sourceform;
			$params .= "&urlok=" . $urlok;
			$params .= "&urlko=" . $urlko;
			$params .= "&confirmationTemplate=" . $confirmationTemplate;
			$params .= "&active=" . $active;
			$params .= "&isdefault=" . $isdefault;
			$this->method = "doForms_UpdateForm";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_SearchReports($accountid, $formid, $count = 0, $searchText = '', $rows = '', $filter = '', $order = '', $logicCondition = '', $up = 0, $initDate = '', $endDate = '', $rand, $initPagination = 0, $limitPagination = 0)
		{
			$params = "accountid=" . $accountid;
			$params .= "&formid=" . $formid;
			$params .= "&count=" . $count;
			$params .= "&searchText=" . $searchText;
			$params .= "&rows=" . $rows;
			$params .= "&filter=" . $filter;
			$params .= "&order=" . $order;
			$params .= "&logicCondition=" . $logicCondition;
			$params .= "&up=" . $up;
			$params .= "&initDate=" . $initDate;
			$params .= "&endDate=" . $endDate;
			$params .= "&rand=" . $rand;
			$params .= "&limitPagination=" . $initPagination;
			$this->method = "doForms_SearchReports";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_GetSubmissionsPerMonth($id = 0, $month = 0, $year = 0)
		{
			$params = "id=" . $id;
			$params .= "&month=" . $month;
			$params .= "&year=" . $year;
			$this->method = "doForms_GetSubmissionsPerMonth";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_GetFormFields($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doForms_GetFormFields";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_GetFormFieldsToImport($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doForms_GetFormFieldsToImport";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_ClearData($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doForms_ClearData";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Delete form data
			* @param int id Form data identifier
			* @return boolean
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Form_Data_Delete($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Form_Data_Delete";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_DeleteFormDataSelected($id, $op)
		{
			$params = "id=" . $id;
			$params .= "&op=" . $op;
			$this->method = "doForms_DeleteFormDataSelected";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Delete form
			* @param int id Form identifier
			* @return boolean
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Form_Delete()
		{
			$params = "id=" . $id;
			$this->method = "doforms_Form_Delete";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_DeleteFormView($id, $searchText, $rows, $filter, $order, $initDate, $endDate)
		{
			$params = "id=" . $id;
			$params .= "searchText=" . $searchText;
			$params .= "rows=" . $rows;
			$params .= "filter=" . $filter;
			$params .= "order=" . $order;
			$params .= "initDate=" . $initDate;
			$params .= "endDate=" . $endDate;
			$this->method = "doForms_DeleteFormView";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get the categories of Form templates
			* @return array
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_FormTemplatesCategories()
		{
			$params = "id=" . $id;
			$this->method = "doforms_FormTemplatesCategories";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get the Form templates of a category
			* @return array
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_FormTemplatesbyCategory()
		{
			$params = "category=" . $category;
			$this->method = "doforms_FormTemplatesbyCategory";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Get the Form templates of a category
			* @return array
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doforms_GetFormTemplate($id)
		{
			$params = "id=" . $id;
			$this->method = "doforms_GetFormTemplate";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Template_Enabled($id)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Template_Enabled";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Template_Disabled($id)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Template_Disabled";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Template_Publish($id)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Template_Publish";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_Template_Delete($id)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Template_Delete";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_LoadStatisticsByHour($id, $beginDate, $endDate, $timezonevalue)
		{
			$params = "id=" . $id;
			$params .= "beginDate=" . $beginDate;
			$params .= "endDate=" . $endDate;
			$params .= "timezonevalue=" . $timezonevalue;
			$this->method = "doforms_LoadStatisticsByHour";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* Copy the form
			* @param int id Form identifier to copy
			* @return boolean
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doforms_Form_Copy($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_Form_Copy";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_GetFormDataWithSubscribers($ids)
		{
			$params = "ids=" . $ids;
			$this->method = "doforms_Form_Copy";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_MarkFormDataAsRead($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_MarkFormDataAsRead";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doforms_MarkFormDataAsUnRead($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doforms_MarkFormDataAsRead";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		function doForms_Save($id, $name, $description, $encoded, $type, $url, $urlLogo, $urlMessage, $urlBack, $urlStyle, $emails, $followUp, $encodedGeneral, $canRepeatData, $urlok, $urlko, $template)
		{
			$params = "id=" . $id;
			$params .= "&name=" . $name;
			$params .= "&description=" . $description;
			$params .= "&encoded=" . $encoded;
			$params .= "&type=" . $type;
			$params .= "&url=" . $url;
			$params .= "&urlLogo=" . $urlLogo;
			$params .= "&urlMessage=" . $urlMessage;
			$params .= "&urlBack=" . $urlBack;
			$params .= "&urlStyle=" . $urlStyle;
			$params .= "&emails=" . $emails;
			$params .= "&followUp=" . $followUp;
			$params .= "&encodedGeneral=" . $encodedGeneral;
			$params .= "&canRepeatData=" . $canRepeatData;
			$params .= "&urlok=" . $urlok;
			$params .= "&urlko=" . $urlko;
			$params .= "&template=" . $template;
			$this->method = "doForms_Save";
			return $this->Call_Mandoo_Api_V1($params);
		}

		function doForms_SaveTemplate($id, $name, $encoded, $encodedGeneral, $style)
		{
			$params = "id=" . $id;
			$params .= "&name=" . $name;
			$params .= "&encoded=" . $encoded;
			$params .= "&encodedGeneral=" . $encodedGeneral;
			$params .= "&style=" . $style;
			$this->method = "doForms_SaveTemplate";
			return $this->Call_Mandoo_Api_V1($params);
		}
		
		/****
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doForms_GetFormsPublicId($id = null)
		{
			$params = "";
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method 		= "doForms_GetFormsPublicId";
			return $this->Call_Mandoo_Api_V1($params);
		}
		
		/***************************************************************************/
		/*								doDeals									 */
		/***************************************************************************/
		/****
				* Create a new deal
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_NewDeal($name, $url, $description = null, $startDate = null, $endDate = null, $image = null, $slideimage = null, $slideimage2 = null, $slideimage3 = null, $value, $status = null, $minUserLimit = null, $maxUserLimit = null, $realValue, $category, $person = null, $phoneNo = null, $address = null, $finePrints, $highlights, $termsAndCondition, $payCaptureStatus, $sideDeal, $metaKeywords, $metaDescription, $mainDeal, $expiryDate, $isVideo, $embedCode, $maxDealPurchase, $instantDeal, $forceCouponClosed)
			{
				$params  = "name=" 				. $name;
				$params .= "&url=" 				. $url;
				$params .= "&description=" 		. $description;
				$params .= "&startDate=" 		. $startDate;
				$params .= "&endDate=" 			. $endDate;
				$params .= "&image=" 			. $image;
				$params .= "&slideimage=" 		. $slideimage;
				$params .= "&slideimage2=" 		. $slideimage2;
				$params .= "&&slideimage3=" 	. $slideimage3;
				$params .= "&value=" 			. $value;
				$params .= "&status=" 			. $status;
				$params .= "&minUserLimit=" 	. $minUserLimit;
				$params .= "&maxUserLimit=" 	. $maxUserLimit;
				$params .= "&realValue=" 		. $realValue;
				$params .= "&category=" 		. $category;
				$params .= "&person=" 			. $person;
				$params .= "&phoneNo=" 			. $phoneNo;
				$params .= "&address=" 			. $address;
				$params .= "&finePrints=" 		. $finePrints;
				$params .= "&highlights=" 		. $highlights;
				$params .= "&termsAndCondition=". $termsAndCondition;
				$params .= "&payCaptureStatus=" . $payCaptureStatus;
				$params .= "&sideDeal=" 		. $sideDeal;
				$params .= "&metaKeywords=" 	. $metaKeywords;
				$params .= "&metaDescription=" 	. $metaDescription;
				$params .= "&mainDeal=" 		. $mainDeal;
				$params .= "&expiryDate=" 		. $expiryDate;
				$params .= "&isVideo=" 			. $isVideo;
				$params .= "&embedCode=" 		. $embedCode;
				$params .= "&maxDealPurchase=" 	. $maxDealPurchase;
				$params .= "&instantDeal=" 		. $instantDeal;
				$params .= "&forceCouponClosed=". $forceCouponClosed;

				$params = "";
				$this->method = "doDeals_NewDeal";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Update an existent deal
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_UpdateDeal($id, $name, $url, $description = null, $startDate = null, $endDate = null, $image = null, $slideimage = "", $slideimage2 = "", $slideimage3 = "", $value, $status = null, $minUserLimit = null, $maxUserLimit = null, $realValue, $category, $person = null, $phoneNo = null, $address = null, $finePrints, $highlights, $termsAndCondition, $payCaptureStatus, $sideDeal, $metaKeywords, $metaDescription, $mainDeal, $expiryDate, $isVideo, $embedCode, $maxDealPurchase, $instantDeal, $forceCouponClosed)
			{
				$params  = "id=" 				. $id;
				$params .= "name=" 				. $name;
				$params .= "&url=" 				. $url;
				$params .= "&description=" 		. $description;
				$params .= "&startDate=" 		. $startDate;
				$params .= "&endDate=" 			. $endDate;
				$params .= "&image=" 			. $image;
				$params .= "&slideimage=" 		. $slideimage;
				$params .= "&slideimage2=" 		. $slideimage2;
				$params .= "&&slideimage3=" 	. $slideimage3;
				$params .= "&value=" 			. $value;
				$params .= "&status=" 			. $status;
				$params .= "&minUserLimit=" 	. $minUserLimit;
				$params .= "&maxUserLimit=" 	. $maxUserLimit;
				$params .= "&realValue=" 		. $realValue;
				$params .= "&category=" 		. $category;
				$params .= "&person=" 			. $person;
				$params .= "&phoneNo=" 			. $phoneNo;
				$params .= "&address=" 			. $address;
				$params .= "&finePrints=" 		. $finePrints;
				$params .= "&highlights=" 		. $highlights;
				$params .= "&termsAndCondition=". $termsAndCondition;
				$params .= "&payCaptureStatus=" . $payCaptureStatus;
				$params .= "&sideDeal=" 		. $sideDeal;
				$params .= "&metaKeywords=" 	. $metaKeywords;
				$params .= "&metaDescription=" 	. $metaDescription;
				$params .= "&mainDeal=" 		. $mainDeal;
				$params .= "&expiryDate=" 		. $expiryDate;
				$params .= "&isVideo=" 			. $isVideo;
				$params .= "&embedCode=" 		. $embedCode;
				$params .= "&maxDealPurchase=" 	. $maxDealPurchase;
				$params .= "&instantDeal=" 		. $instantDeal;
				$params .= "&forceCouponClosed=". $forceCouponClosed;

				$params = "";
				$this->method = "doDeals_UpdateDeal";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Enable an existent deal
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_Deal_Enable($id = 0)
			{
				//coupon_status = D -> disabled
				//coupon_status = A -> enabled
				//coupon_status = C -> closed
				//coupon_status = W -> wait
				//coupon_status = S -> save
				//coupon_status = E -> expired
				$params = "id=" . $id;
				$this->method = "doDeals_Deal_Enable";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Disable an existent deal
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_Deal_Disable($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_Deal_Disable";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Delete an existent deal
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_Deal_Delete($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_Deal_Delete";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Get the user deals
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetDeals($init = 0, $end = 0, $status = "", $initDate = "", $endDate = "", $search = "")
			{
				$params  = "init=" . $init;
				$params .= "&end=" . $end;
				$params .= "&status=" . $status;
				$params .= "&initDate=" . $initDate;
				$params .= "&endDate=" . $endDate;
				$params .= "&search=" . $search;
				$this->method = "doDeals_GetDeals";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				* Get the counter of deals
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetNumDeals($status = "", $initDate = "", $endDate = "", $search = "")
			{
				$params = "status=" . $status;
				$params .= "&initDate=" . $initDate;
				$params .= "&endDate=" . $endDate;
				$params .= "&search=" . $search;
				$this->method = "doDeals_GetNumDeals";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetTransactions($id, $transactionStatus = "", $code = "", $user = "", $initDate = "", $endDate = "", $init = 0, $end = 0)
			{
				$params = "id=" . $id;
				$params .= "&transactionStatus=" . $transactionStatus;
				$params .= "&code=" . $code;
				$params .= "&user=" . $user;
				$params .= "&initDate=" . $initDate;
				$params .= "&endDate=" . $endDate;
				$params .= "&init=" . $init;
				$params .= "&end=" . $end;
				$this->method = "doDeals_GetTransactions";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetNumTransactions($id, $transactionStatus = "", $code = "", $user = "", $initDate = "", $endDate = "")
			{
				$params = "id=" . $id;
				$params .= "&transactionStatus=" . $transactionStatus;
				$params .= "&code=" . $code;
				$params .= "&user=" . $user;
				$params .= "&initDate=" . $initDate;
				$params .= "&endDate=" . $endDate;
				$this->method = "doDeals_GetNumTransactions";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetCouponCategories()
			{
				$params = "";
				$this->method = "doDeals_GetCouponCategories";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_CheckShopCoupon($id, $shopid)
			{
				$params = "id=" . $id;
				$params .= "&shopid=" . $shopid;
				$this->method = "doDeals_CheckShopCoupon";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_ValidateCoupon($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_ValidateCoupon";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_ConfirmCoupon($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_ConfirmCoupon";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetShopAccount()
			{
				$params = "";
				$this->method = "doDeals_GetShopAccount";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetSmtpData()
			{
				$params = "";
				$this->method = "doDeals_GetSmtpData";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetShopBalance()
			{
				$params = "";
				$this->method = "doDeals_GetShopBalance";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetDiscountValue($realvalue = "", $dealvalue = "")
			{
				$params = "realvalue=" . $realvalue;
				$params .= "&dealvalue=" . $dealvalue;
				$this->method = "doDeals_GetDiscountValue";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetContract($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_GetContract";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_DeleteDealContract($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_DeleteDealContract";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_DealsResumeStats()
			{
				$params = "";
				$this->method = "doDeals_DealsResumeStats";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_CouponsSoldStats($init, $end)
			{
				$params = "init=" . $init;
				$params .= "&end=" . $end;
				$this->method = "doDeals_CouponsSoldStats";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_DealsStats($id = 0, $init, $end)
			{
				$params = "id=" . $id;
				$params .= "&init=" . $init;
				$params .= "&end=" . $end;
				$this->method = "doDeals_DealsStats";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_ManageDealsStats($init, $end)
			{
				$params = "init=" . $init;
				$params .= "&end=" . $end;
				$this->method = "doDeals_DealsStats";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetShop($id)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_GetShop";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetMerchantCode()
			{
				$params = "";
				$this->method = "doDeals_GetMerchantCode";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_UpdateMerchantCode($code)
			{
				$params = "code=" . $code;
				$this->method = "doDeals_UpdateMerchantCode";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_GetShopData($id = 0)
			{
				$params = "id=" . $id;
				$this->method = "doDeals_GetShopData";
				return $this->Call_Mandoo_Api_V1($params);
			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_NewShop($accountid, $username, $firstname, $lastname, $email, $mobile, $shopname, $address, $city, $status = "A", $latitude = "", $longitude = "", $createdby = 1, $url, $cp, $cif, $alias)
			{

				$params = "accountid=" . $accountid;
				$params .= "&username=" . $username;
				$params .= "&firstname=" . $firstname;
				$params .= "&lastname=" . $lastname;
				$params .= "&email=" . $email;
				$params .= "&mobile=" . $mobile;
				$params .= "&shopname=" . $shopname;
				$params .= "&address=" . $address;
				$params .= "&city=" . $city;
				$params .= "&status=" . $status;
				$params .= "&latitude=" . $latitude;
				$params .= "&longitude=" . $longitude;
				$params .= "&createdby=" . $createdby;
				$params .= "&url=" . $url;
				$params .= "&cp=" . $cp;
				$params .= "&cif=" . $cif;
				$params .= "&alias=" . $alias;

				$this->method = "doDeals_NewShop";
				return $this->Call_Mandoo_Api_V1($params);

			}
			/****
				*
				*
				*
				* @category doForms
				* @package  doForms
				* @version 1.0.0
				* @author Mandoo <help@mandoocms.com>
				* @copyright 2012 Mandoo TM
			*/
			public function doDeals_UpdateShop($accountid, $username, $firstname, $lastname, $email, $mobile, $shopname, $address, $city, $latitude = "", $longitude = "", $url, $cp, $cif, $alias)
			{
				$params = "accountid=" . $accountid;
				$params .= "&username=" . $username;
				$params .= "&firstname=" . $firstname;
				$params .= "&lastname=" . $lastname;
				$params .= "&email=" . $email;
				$params .= "&mobile=" . $mobile;
				$params .= "&shopname=" . $shopname;
				$params .= "&address=" . $address;
				$params .= "&city=" . $city;
				$params .= "&latitude=" . $latitude;
				$params .= "&longitude=" . $longitude;
				$params .= "&url=" . $url;
				$params .= "&cp=" . $cp;
				$params .= "&cif=" . $cif;
				$params .= "&alias=" . $alias;
				$this->method = "doDeals_UpdateShop";
				return $this->Call_Mandoo_Api_V1($params);
			}
		/***************************************************************************/
		/*								doBot									 */
		/***************************************************************************/
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_NewService($name, $description, $enabled, $productId = 0, $url = "", $image = "", $linked = 0, $shared = 0)
		{
			$params = "name=" . $name;
			$params .= "description=" . $description;
			$params .= "enabled=" . $enabled;
			$params .= "productId=" . $productId;
			$params .= "url=" . $url;
			$params .= "image=" . $image;
			$params .= "linked=" . $linked;
			$params .= "shared=" . $shared;
			$this->method = "doBot_NewService";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_UpdateService($id, $name, $description, $enabled, $productId = 0, $url = "", $image = "", $linked = 0, $shared = 0)
		{
			$params = "id=" . $id;
			$params .= "&name=" . $name;
			$params .= "&description=" . $description;
			$params .= "&enabled=" . $enabled;
			$params .= "&productId=" . $productId;
			$params .= "&url=" . $url;
			$params .= "&image=" . $image;
			$params .= "&linked=" . $linked;
			$params .= "&shared=" . $shared;
			$this->method = "doBot_UpdateService";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_DeleteService($id)
		{
			$params = "id=" . $id;
			$this->method = "doBot_DeleteService";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetNumServices($private = true)
		{
			$params = "private=" . $private;
			$this->method = "doBot_GetNumServices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetServices($enabled = true, $private = true, $init = 0, $end = 0)
		{
			$params = "enabled=" . $enabled;
			$params .= "&private=" . $private;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetServices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetService($id, $private = true)
		{
			$params = "id=" . $id;
			$params .= "&private=" . $private;
			$this->method = "doBot_GetService";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetNumServicesConditions($private = true)
		{
			$params = "private=" . $private;
			$this->method = "doBot_GetNumServicesConditions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*

			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetServicesWithConditions($private = true, $init = 0, $end = 0)
		{
			$params = "private=" . $private;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetServicesWithConditions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetNumServicesActions($private = true, $id = 0)
		{
			$params = "private=" . $private;
			$params .= "&id=" . $id;
			$this->method = "doBot_GetNumServicesActions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetServicesWithActions($private = true, $id = 0, $init = 0, $end = 0)
		{
			$params = "private=" . $private;
			$params .= "&id=" . $id;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetServicesWithActions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetServicesByAccount($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doBot_GetServicesByAccount";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_EnableServiceAccount($id = 0, $value = 0)
		{
			$params = "id=" . $id;
			$params .= "&value=" . $value;
			$this->method = "doBot_EnableServiceAccount";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_DeleteServiceAccount($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doBot_DeleteServiceAccount";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetConditions($id = 0, $serviceid = 0, $private = true, $init = 0, $end = 0)
		{
			$params = "id=" . $id;
			$params .= "&serviceid=" . $serviceid;
			$params .= "&private=" . $private;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetConditions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetActions($id = 0, $serviceid = 0, $private = true, $conditionid = 0, $init = 0, $end = 0)
		{
			$params = "id=" . $id;
			$params .= "&serviceid=" . $serviceid;
			$params .= "&private=" . $private;
			$params .= "&conditionid=" . $conditionid;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetActions";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_UpdateTrigger($id, $conditionid, $actionid, $enabled, $conditionAttrs = "", $actionAttrs = "", $description = "")
		{
			$params = "id=" . $id;
			$params .= "&conditionid=" . $conditionid;
			$params .= "&actionid=" . $actionid;
			$params .= "&enabled=" . $enabled;
			$params .= "&conditionAttrs=" . $conditionAttrs;
			$params .= "&actionAttrs=" . $actionAttrs;
			$params .= "&description=" . $description;
			$this->method = "doBot_UpdateTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_DeleteTrigger($id)
		{
			$params = "id=" . $id;
			$this->method = "doBot_DeleteTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetNumTriggers($init = 0, $end = 0)
		{
			$params = "init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetNumTriggers";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetTriggers($id = 0, $init = 0, $end = 0)
		{
			$params = "id=" . $id;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetTriggers";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_EnableTrigger($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doBot_EnableTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_DisableTrigger($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doBot_EnableTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_UserHasTrigger($id = 0, $userid = 0, $accountid = 0)
		{
			$params = "id=" . $id;
			$params .= "&userid=" . $userid;
			$params .= "&accountid=" . $accountid;
			$this->method = "doBot_UserHasTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_QueueTrigger($id)
		{
			$params = "id=" . $id;
			$this->method = "doBot_QueueTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_PopTrigger($limit = 100)
		{
			$params = "limit=" . $limit;
			$this->method = "doBot_PopTrigger";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_CreateTriggerLog($id, $status, $log)
		{
			$params = "id=" . $id;
			$params .= "&status=" . $status;
			$params .= "&log=" . $log;
			$this->method = "doBot_CreateTriggerLog";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_CheckTriggerTimer($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doBot_CheckTriggerTimer";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetNumLogsByAccount($id = 0, $init = "", $end = "", $status = "")
		{
			$params = "id=" . $id;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$params .= "&status=" . $status;
			$this->method = "doBot_GetNumLogsByAccount";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetLogsByAccount($id = 0, $initDate = "", $endDate = "", $status = "", $init = 0, $end = 0)
		{
			$params = "id=" . $id;
			$params .= "&initDate=" . $initDate;
			$params .= "&endDate=" . $endDate;
			$params .= "&status=" . $status;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doBot_GetNumServices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetTriggerLogsByDateStatistics($id, $init, $end)
		{
			$params = "id=" . $id;
			$params = "&init=" . $init;
			$params = "&end=" . $end;
			$this->method = "doBot_GetNumServices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetMonthlyLogsByDateStatistics($init, $end)
		{
			$params = "init=" . $init;
			$params = "&end=" . $end;
			$this->method = "doBot_GetNumServices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doBot_GetTriggersResumeStatistics()
		{
			$params = "";
			$this->method = "doBot_GetTriggersResumeStatistics";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/***************************************************************************/
		/*								doAccount							 	 */
		/***************************************************************************/
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetTimezoneUser($id)
		{
			$params = "id=" . $id;
			$this->method = "doAccount_GetTimezoneUser";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetNumProducts()
		{
			$params = "";
			$this->method = "doAccount_GetNumProducts";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetNumProductsContracted($id = 0)
		{
			$params = "id=" . $id;
			$this->method = "doAccount_GetNumProductsContracted";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetProductsContracted($id, $init = 0, $end = 0)
		{
			$params = "id=" . $id;
			$params .= "&init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doAccount_GetProductsContracted";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetAccountEmails()
		{
			$params = "";
			$this->method = "doAccount_GetAccountEmails";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetTimezone()
		{
			$params = "";
			$this->method = "doAccount_GetTimezone";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetCreatedTime()
		{
			$params = "";
			$this->method = "doAccount_GetCreatedTime";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetWebsite()
		{
			$params = "";
			$this->method = "doAccount_GetWebsite";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_LastAccesses($id)
		{
			$params = "id=" . $id;
			$this->method = "doAccount_LastAccesses";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetNumInvoices()
		{
			$params = "";
			$this->method = "doAccount_GetNumInvoices";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetProducts($init = 0, $end = 0)
		{
			$params = "init=" . $init;
			$params .= "&end=" . $end;
			$this->method = "doAccount_GetProducts";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetPack()
		{
			$params = "id=" . $id;
			$this->method = "doAccount_GetPack";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_UpdateAccesses($link, $title)
		{
			$params = "link=" . $link;
			$params .= "&title=" . $title;
			$this->method = "doAccount_UpdateAccesses";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetAccountCreatedTime()
		{
			$params = "";
			$this->method = "doAccount_GetAccountCreatedTime";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetProduct($id)
		{
			$params = "id=" . $id;
			$this->method = "doAccount_GetProduct";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetAccounts()
		{
			$params = "";
			$this->method = "doAccount_GetAccounts";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			*
			*
			* @category doForms
			* @package  doForms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doAccount_GetAccountUsers()
		{
			$params = "";
			$this->method = "doAccount_GetAccountUsers";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/***************************************************************************/
		/*								doSMS								 	   */
		/***************************************************************************/
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_Groups($ids = null)
		{
			$params = "ids=0";
			if (isset($ids) && $ids != null && $ids != "" && $ids != 0) {
				$params = "ids=" . $ids;
			}
			$this->method = "doSms_Groups";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_Group_Subscribers($ids = null)
		{
			$params = "ids=0";
			if (isset($ids) && $ids != null && $ids != "" && $ids != 0) {
				$params = "ids=" . $ids;
			}
			$this->method = "doSms_Group_Subscribers";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_AddGroup($title = "")
		{
			$params = "title=";
			if (isset($title) && $title != null && $title != "") {
				$params = "title=" . rawurlencode($title);
			}
			$this->method = "doSms_AddGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_UpdateGroup($id, $title = "")
		{
			$params = "title=";
			if (isset($title) && $title != null && $title != "") {
				$params = "title=" . $title;
			}
			if (isset($id) && $id != null && $id != "") {
				$params .= "&id=" . $id;
			}
			$this->method = "doSms_UpdateGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_DeleteGroup($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method = "doSms_DeleteGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_AddSubscriber($mobile)
		{
			if (isset($mobile) && $mobile != null && $mobile != "") {
				$params = "mobile=" . rawurlencode($mobile);
			}
			$this->method 		= "doSms_AddSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_IsSubscriber($mobile)
		{
			if (isset($mobile) && $mobile != null && $mobile != "") {
				$params = "mobile=" . rawurlencode($mobile);
			}
			$this->method 		= "doSms_IsSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_GetSubscriber($id, $mobile)
		{
			$params = "1=1";
			if (isset($id) && $id != null && $id != "") {
				$params .= "&id=" . $id;
			}
			if (isset($mobile) && $mobile != null && $mobile != "") {
				$params .= "&mobile=" . rawurlencode($mobile);
			}
			$this->method 		= "doSms_GetSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_DeleteSubscriber($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method 		= "doSms_DeleteSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_DeleteSubscriberMobile($mobile)
		{
			if (isset($mobile) && $mobile != null && $mobile != "") {
				$params = "mobile=" . rawurlencode($mobile);
			}
			$this->method 		= "doSms_DeleteSubscriberMobile";

			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_AddSubscriberToGroup($id, $users)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			if (isset($users) && $users != null && $users != "") {
				$params .= "&users=" . $users;
			}
			$this->method 		= "doSms_AddSubscriberToGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_RemoveSubscriberToGroup($id, $users)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			if (isset($users) && $users != null && $users != "") {
				$params .= "&users=" . $users;
			}
			$this->method 		= "doSms_RemoveSubscriberToGroup";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_SendSMS($campaignId, $groups, $message, $description)
		{
			if (isset($campaignId) && $campaignId != null && $campaignId != "") {
				$params = "campaignId=" . $campaignId;
			}
			if (isset($groups) && $groups != null && $groups != "") {
				$params .= "&groups=" . $groups;
			}
			if (isset($message) && $message != null && $message != "") {
				$params .= "&message=" . rawurlencode($message);
			}
			if (isset($description) && $description != null && $description != "") {
				$params .= "&description=" . rawurlencode($description);
			}
			

			$this->method 		= "doSms_SendSMS";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_SendSMSToSubscriber($campaignId, $subscriber, $message, $description)
		{
			if (isset($campaignId) && $campaignId != null && $campaignId != "") {
				$params = "campaignId=" . $campaignId;
			}
			if (isset($subscriber) && $subscriber != null && $subscriber != "") {
				$params .= "&subscriber=" . rawurlencode($subscriber);
			}
			if (isset($message) && $message != null && $message != "") {
				$params .= "&message=" . rawurlencode($message);
			}
			if (isset($description) && $description != null && $description != "") {
				$params .= "&description=" . rawurlencode($description);
			}

			$this->method 		= "doSms_SendSMSToSubscriber";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_AddCampaign($name)
		{
			if (isset($name) && $name != null && $name != "") {
				$params = "name=" . rawurlencode($name);
			}
			$this->method = "doSms_AddCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_DeleteCampaign($id)
		{
			if (isset($id) && $id != null && $id != "") {
				$params = "id=" . $id;
			}
			$this->method = "doSms_DeleteCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/****
			* @category doSms
			* @package  doSms
			* @version 1.0.0
			* @author Mandoo <help@mandoocms.com>
			* @copyright 2012 Mandoo TM
		*/
		public function doSms_GetCampaign($id)
		{
			if (isset($id)) {
				$params = "id=" . $id;
			}
			$this->method = "doSms_GetCampaign";
			return $this->Call_Mandoo_Api_V1($params);
		}
		/***************************************************************************/
		/*								private									 */
		/***************************************************************************/
		private function Call_Mandoo_Api_V1($params) {
			$this->output = null;
			$sign = $this->clientId . $this->responseFormat . $this->method . $this->clientSecret;
			$parameters = "key=" . $this->clientSecret . "&output=". $this->responseFormat;
			if (!empty($params)) {
				$parameters .= "&" . $params;
			}
			$parameters .= "&sign=" . strtolower(sha1($sign));
			if(strtolower($this->httpmethod) == "get")$curlUrl = $this->apiurl . $this->method . "?" . $parameters;
			if(strtolower($this->httpmethod) == "post")$curlUrl = $this->apiurl . $this->method;

			$ch = curl_init( $curlUrl );
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //=> Para cuando es https
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			//curl_setopt($ch, CURLOPT_TIMEOUT, 1);
			if (strtolower($this->httpmethod) == "post") curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
			$this->output = curl_exec($ch);
			curl_close($ch);
			switch ($this->responseFormat) {
				case "json":
					if ($this->includeoutheader) { header('Content-type: application/json'); }
					return $this->output;
					break;
				case "xml":
					if ($this->includeoutheader) { header('Content-type: text/xml'); }
					return $this->output;
					break;
				case "serialized":
					if ($this->includeoutheader) { header('Content-type: text/plain'); }
					return $this->output;
					break;
				case "return":
					return $this->output;
					break;
			}
		}
	}
?>