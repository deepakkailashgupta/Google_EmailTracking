<?php

//http://www.google-analytics.com/collect?v=1&tid=UA-12345678-1&cid=CLIENT_ID_NUMBER&t=event&ec=email&ea=open&el=recipient_id&cs=newsletter&cm=email&cn=Campaign_Name
//https://developers.google.com/analytics/devguides/collection/protocol/v1/reference
//URL Component 		Explanation
//v=1 					Protocol version within Google Analytics
//tid=UA-12345678-1 	Your Google Analytics Tracking ID
//cid=CLIENT_ID_NUMBER 	A systematic tracking ID for the customer
//t=event 				Tells Google Analytics this is an Event Hit Type
//ec=email 				The Event Category helps segment various events
//ea=open 				The Event Action helps specify exactly what happened
//el=recipient_id 		Event Label specifies a unique identification for this recipient
//cs=newsletter 		Campaign Source allows segmentation of campaign types
//cm=email 				Campaign Medium could segment social vs. email, etc.
//cn=Campaign_Name 		Campaign Name identifies the campaign to you

//<img src="https://www.google-analytics.com/collect?v=1&..."/>

class Google_EmailTracking {

	static function getTrackingPixel($recipient_id = '',$campaign_source = '',$campaign_medium = '',$campaign_name = '', $event = 'event',$event_category='email',$event_action ='open'){
		
		$campaign_name = str_replace(' ','_',TL_Formatting::format_as_string($campaign_name));
		
		$url = sprintf('https://www.google-analytics.com/collect?v=1&tid=%s&cid=%s&t=%s&ec=%s&ea=%s&el=%s&cs=%s&cm=%s&cn=%s',
						config_item('google_analytic_tracking_id'),
						config_item('google_analytic_client_id'),			
						$event,
						$event_category,
						$event_action,
						$recipient_id,
						$campaign_source,
						$campaign_medium,
						$campaign_name						
						);
 
		return '<img src="'.$url.'"/>';
	}
	
}
