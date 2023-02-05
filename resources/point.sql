SET
    @my_point = 0;

SET
    @service_point = 0;

SET
    @user_id = 1;

SELECT
    @my_point := (
        CASE WHEN point_type = 10 THEN
            CASE WHEN point >= 0 THEN
                @my_point + point
            ELSE
                CASE WHEN @service_point + point < 0 THEN
                    @my_point + @service_point + point
                ELSE
                    @my_point
                END
            END
        ELSE
            CASE WHEN point_type = 99 THEN
                CASE WHEN point < 0 THEN
                    CASE WHEN @service_point + point < 0 THEN
                        @my_point + @service_point + point
                    ELSE
                        @my_point
                    END
                ELSE
                    @my_point
                END
            END
        END
    ) AS my_point,
    @service_point := (
        CASE WHEN point_type = 10 THEN
            CASE WHEN point >= 0 THEN
                @service_point
            ELSE
                CASE WHEN @service_point + point < 0 THEN
                    0
                ELSE
                    @service_point + point
                END
            END
        ELSE
            CASE WHEN point_type = 99 THEN
                CASE WHEN point < 0 THEN
                    CASE WHEN @service_point + point < 0 THEN
                        0
                    ELSE
                        @service_point + point
                    END
                ELSE
                    @service_point + point
                END
            END
        END
    ) AS service_point
FROM
    point_history
WHERE user_id = @user_id;

UPDATE users
SET
    my_point = CAST(@my_point := @my_point AS UNSIGNED)
    , service_point = CAST(@service_point := @service_point AS UNSIGNED)
WHERE id = @user_id := @user_id;


SELECT * from users where id = @user_id := @user_id;
