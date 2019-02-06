CREATE EVENT `update_event_joined` 
ON  SCHEDULE EVERY 1 HOUR
STARTS CURRENT_TIMESTAMP + INTERVAL 1 HOUR
	DO CALL update_seller_event_joined();
		 
SHOW events;


SHOW PROCESSLIST;

SET GLOBAL event_scheduler = ON;
SET @@GLOBAL.event_scheduler = ON;
SET GLOBAL event_scheduler = 1;
SET @@GLOBAL.event_scheduler = 1;


-- select Active event 
	SELECT `id` FROM `event_joined` WHERE `event_shop_id` IN (
			SELECT `id` FROM `event_shop` WHERE event_id  IN (
				SELECT event_id FROM `event` WHERE deleted_at IS NULL AND now() < event_exp
			)
		);
