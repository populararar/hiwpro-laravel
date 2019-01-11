php artisan infyom:scaffold Event  --fromTable --tableName=event --primary=event_id

php artisan infyom:scaffold Event --fieldsFile=table_events.json --tableName=event --primary=event_id

php artisan infyom:scaffold Location --fieldsFile=table_location.json --tableName=location --primary=location_id

php artisan infyom:scaffold Shop  --fromTable --tableName=shop --primary=shop_id --relations

php artisan infyom:scaffold Product  --fromTable --tableName=product --primary=product_id --relations

php artisan infyom:scaffold Category  --fromTable --tableName=category --primary=category_id --relations

php artisan infyom:scaffold EventShop  --fromTable --tableName=event_shop --primary=id --relations

php artisan infyom:scaffold Productevent  --fromTable --tableName=product_event --primary=id --relations

php artisan infyom:scaffold Users  --fromTable --tableName=users --primary=id --relations


// menus

php artisan infyom:scaffold Menu  --fromTable --tableName=menus --primary=id --relations

// permission

php artisan infyom:scaffold Permissions  --fromTable --tableName=permissions --primary=id --relations

php artisan infyom:scaffold EventJoined  --fromTable --tableName=event_joined --primary=id --relations

php artisan infyom:scaffold OrderHeader  --fromTable --tableName=order_header --primary=id --relations


php artisan infyom:scaffold OrderDetail  --fromTable --tableName=order_detail --primary=id --relations


ALTER TABLE `hiwpro`.`event_joined` 
ADD COLUMN `created_at` TIMESTAMP NULL AFTER `score`,
ADD COLUMN `updated_at` TIMESTAMP NULL AFTER `created_at`,
ADD COLUMN `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
