php artisan infyom:scaffold Event  --fromTable --tableName=event --primary=event_id

php artisan infyom:scaffold Event --fieldsFile=table_events.json --tableName=event --primary=event_id

php artisan infyom:scaffold Location --fieldsFile=table_location.json --tableName=location --primary=location_id

php artisan infyom:scaffold Shop  --fromTable --tableName=shop --primary=shop_id --relations

php artisan infyom:scaffold Product  --fromTable --tableName=product --primary=product_id --relations

php artisan infyom:scaffold Category  --fromTable --tableName=category --primary=category_id --relations

php artisan infyom:scaffold EventShop  --fromTable --tableName=event_shop --primary=id --relations

php artisan infyom:scaffold Productevent  --fromTable --tableName=product_event --primary=id --relations

