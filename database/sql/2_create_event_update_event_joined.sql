CREATE EVENT `update_event_joined` 
ON  SCHEDULE EVERY 1 HOUR
STARTS CURRENT_TIMESTAMP + INTERVAL 1 HOUR
	DO CALL update_seller_event_joined();
		 
SHOW events;