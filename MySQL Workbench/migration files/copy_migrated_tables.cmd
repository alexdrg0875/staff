REM Workbench Table Data copy script
REM Workbench Version: 8.0.15
REM 
REM Execute this to copy table data from a source RDBMS to MySQL.
REM Edit the options below to customize it. You will need to provide passwords, at least.
REM 
REM Source DB: Mysql@127.0.0.1:3306 (MySQL)
REM Target DB: Mysql@127.0.0.1:3306


@ECHO OFF
REM Source and target DB passwords
set arg_source_password=
set arg_target_password=
set arg_source_ssh_password=
set arg_target_ssh_password=


REM Set the location for wbcopytables.exe in this variable
set "wbcopytables_path=C:\Program Files\MySQL\MySQL Workbench 8.0 CE"

if not ["%wbcopytables_path%"] == [] set "wbcopytables_path=%wbcopytables_path%"set "wbcopytables=%wbcopytables_path%wbcopytables.exe"

if not exist "%wbcopytables%" (
	echo "wbcopytables.exe doesn't exist in the supplied path. Please set 'wbcopytables_path' with the proper path(e.g. to Workbench binaries)"
	exit 1
)

IF [%arg_source_password%] == [] (
    IF [%arg_target_password%] == [] (
        IF [%arg_source_ssh_password%] == [] (
            IF [%arg_target_ssh_password%] == [] (
                ECHO WARNING: All source and target passwords are empty. You should edit this file to set them.
            )
        )
    )
)
set arg_worker_count=2
REM Uncomment the following options according to your needs

REM Whether target tables should be truncated before copy
REM set arg_truncate_target=--truncate-target
REM Enable debugging output
REM set arg_debug_output=--log-level=debug3


REM Creation of file with table definitions for copytable

set table_file=%TMP%\wb_tables_to_migrate.txt
TYPE NUL > %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`password_resets`	`staff_db_copy`	`password_resets`	-	-	`email`, `token`, `created_at` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`photos`	`staff_db_copy`	`photos`	`id`	`id`	`id`, `path`, `created_at`, `updated_at`, `deleted_at` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`roles`	`staff_db_copy`	`roles`	`id`	`id`	`id`, `name`, `created_at`, `updated_at`, `deleted_at` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`positions`	`staff_db_copy`	`positions`	`id`	`id`	`id`, `name`, `created_at`, `updated_at`, `deleted_at` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`migrations`	`staff_db_copy`	`migrations`	`id`	`id`	`id`, `migration`, `batch` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`staff`	`staff_db_copy`	`staff`	`id`	`id`	`id`, `name`, `user_id`, `position_id`, `photo_id`, `salary`, `parent_id`, `started_at`, `created_at`, `updated_at`, `deleted_at` >> %TMP%\wb_tables_to_migrate.txt
ECHO `staff_db`	`users`	`staff_db_copy`	`users`	`id`	`id`	`id`, `photo_id`, `role_id`, `is_active`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at` >> %TMP%\wb_tables_to_migrate.txt


"%wbcopytables%" ^
 --mysql-source="root@127.0.0.1:3306" ^
 --source-rdbms-type=Mysql ^
 --target="root@127.0.0.1:3306" ^
 --source-password="%arg_source_password%" ^
 --target-password="%arg_target_password%" ^
 --table-file="%table_file%" ^
 --source-ssh-port="22" ^
 --source-ssh-host="" ^
 --source-ssh-user="" ^
 --target-ssh-port="22" ^
 --target-ssh-host="" ^
 --target-ssh-user="" ^
 --source-ssh-password="%arg_source_ssh_password%" ^
 --target-ssh-password="%arg_target_ssh_password%" --thread-count=%arg_worker_count% ^
 %arg_truncate_target% ^
 %arg_debug_output%

REM Removes the file with the table definitions
DEL %TMP%\wb_tables_to_migrate.txt


