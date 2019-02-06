DELIMITER ;;
CREATE DEFINER=`snooker`@`%` PROCEDURE `update_seller_event_joined`()
BEGIN

DECLARE v_finished INT DEFAULT 0;
DECLARE evId  INT DEFAULT 0 ;
DECLARE evIds CURSOR FOR  
		SELECT `id` FROM `event_joined` WHERE `event_shop_id` IN (
			SELECT `id` FROM `event_shop` WHERE event_id  IN (
				SELECT event_id FROM `event` WHERE deleted_at IS NULL AND now() < event_exp
			)
		);

   
-- declare NOT FOUND handler
DECLARE CONTINUE HANDLER 
       FOR NOT FOUND SET v_finished = 1;
        
 OPEN evIds;
 
 get_eventId : LOOP

   FETCH evIds INTO evId;
   IF v_finished = 1 THEN 
      LEAVE get_eventId;
   END IF;
   
   SELECT `last_date_at` INTO @last  FROM `event_joined` WHERE id = evId;
   
   IF (@last IS NULL) THEN 
    ITERATE get_eventId;
   END IF;
   
   SELECT  DATE_FORMAT( now() , '%Y-%m-%d 12:00:00') INTO @now;
   IF @last <  @now THEN 
     UPDATE `event_joined` SET deleted_at = @now WHERE id =  evId;
   END IF;
   
   
 END LOOP get_eventId;
 CLOSE evIds;
END;;
DELIMITER ;