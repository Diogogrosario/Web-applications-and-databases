DROP TABLE IF EXISTS category_detail CASCADE;
DROP TABLE IF EXISTS item_detail CASCADE;
DROP TABLE IF EXISTS apply_discount CASCADE;
DROP TABLE IF EXISTS notification CASCADE;
DROP TABLE IF EXISTS discount CASCADE;
DROP TABLE IF EXISTS wishlist CASCADE;
DROP TABLE IF EXISTS cart CASCADE;
DROP TABLE IF EXISTS item_photo CASCADE;
DROP TABLE IF EXISTS advertisement CASCADE;
DROP TABLE IF EXISTS purchase_item CASCADE;
DROP TABLE IF EXISTS purchase CASCADE;
DROP TABLE IF EXISTS ban CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS item CASCADE;
DROP TABLE IF EXISTS details CASCADE;
DROP TABLE IF EXISTS category CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS address CASCADE;
DROP TABLE IF EXISTS photo CASCADE;
DROP TABLE IF EXISTS country CASCADE;
DROP TABLE IF EXISTS password_resets CASCADE;

DROP TYPE IF EXISTS notificationType;
DROP TYPE IF EXISTS purchaseState;

CREATE TYPE notificationType AS ENUM ('Stock','Discount');
CREATE TYPE purchaseState AS ENUM ('Sent','Processing','Arrived');

CREATE TABLE country (
    country_id SERIAL PRIMARY KEY,
    name text NOT NULL CONSTRAINT country_name_uk UNIQUE
); 


CREATE TABLE photo (
    photo_id SERIAL PRIMARY KEY,
    path text NOT NULL 
);

CREATE TABLE address (
    address_id SERIAL PRIMARY KEY,
    city text NOT NULL,
    street text NOT NULL,
    zip_code text NOT NULL,
    country_id INTEGER REFERENCES country(country_id) ON UPDATE CASCADE
);

CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username text CONSTRAINT username_uk UNIQUE,
    email text CONSTRAINT user_email_uk UNIQUE,
    first_name text,
    last_name text,
    password text,
    deleted BOOLEAN DEFAULT FALSE,
    is_admin BOOLEAN DEFAULT FALSE,
    balance MONEY DEFAULT 0,
    img INTEGER REFERENCES photo(photo_id) ON UPDATE CASCADE ON DELETE SET NULL,
    billing_address INTEGER REFERENCES address(address_id) ON UPDATE CASCADE ON DELETE SET NULL,
    shipping_address INTEGER REFERENCES address(address_id) ON UPDATE CASCADE ON DELETE SET NULL,
    remember_token TEXT
);

CREATE TABLE category (
    category_id SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);
 
CREATE TABLE details (
    detail_id SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);

CREATE TABLE item (
    item_id SERIAL PRIMARY KEY,
    name text NOT NULL,
    stock INTEGER NOT NULL CONSTRAINT pos_stock CHECK (stock >= 0),
    brief_description text,
    description text NOT NULL,
    price MONEY NOT NULL CONSTRAINT pos_price CHECK (price >= 0::MONEY),
    is_archived BOOLEAN NOT NULL DEFAULT false,
    category_id INTEGER REFERENCES category (category_id) ON UPDATE CASCADE,
    score REAL NOT NULL CONSTRAINT rating_ck CHECK (((score >= 0) AND (score <= 5))),
    search tsvector
);

CREATE TABLE review (
    review_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE,
    item_id INTEGER REFERENCES item(item_id) ON UPDATE CASCADE,
    comment_text text,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    rating INTEGER NOT NULL CONSTRAINT rating_ck CHECK (((rating > 0) AND (rating <= 5)))
);
 
CREATE TABLE ban (
    admin_id INTEGER NOT NULL REFERENCES users(user_id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL REFERENCES users(user_id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    reason text NOT NULL,
    PRIMARY KEY (admin_id, user_id)
);

CREATE TABLE purchase (
    purchase_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    billing_address INTEGER REFERENCES address(address_id) ON UPDATE CASCADE,
    shipping_address INTEGER REFERENCES address(address_id) ON UPDATE CASCADE,
    state purchaseState DEFAULT 'Processing'
);
 
CREATE TABLE purchase_item (
    purchase_id INTEGER NOT NULL REFERENCES purchase (purchase_id) ON UPDATE CASCADE,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    price MONEY NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (purchase_id, item_id)
);

CREATE TABLE advertisement (
    advertisement_id INTEGER PRIMARY KEY,
    title text NOT NULL,
    begin_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    end_date TIMESTAMP WITH TIME zone NOT NULL,
    photo_id INTEGER REFERENCES photo (photo_id) ON UPDATE CASCADE,
    CONSTRAINT ad_dates_ck CHECK (begin_date < end_date)
);

CREATE TABLE item_photo (
    photo_id INTEGER NOT NULL REFERENCES photo (photo_id) ON UPDATE CASCADE PRIMARY KEY,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE

);
 

CREATE TABLE cart (
    user_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    add_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (user_id, item_id)
);
 

CREATE TABLE wishlist (
    user_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE,
    item_id INTEGER NOT NULL REFERENCES item(item_id) ON UPDATE CASCADE,
    add_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    PRIMARY KEY (user_id, item_id)
);

CREATE TABLE discount (
    discount_id SERIAL PRIMARY KEY,
    percentage INTEGER NOT NULL CONSTRAINT valid_percentage CHECK (((percentage > 0) AND (percentage <= 100))),
    begin_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    end_date TIMESTAMP WITH TIME zone NOT NULL,
    CONSTRAINT ad_dates_ck CHECK (begin_date < end_date)
);

CREATE TABLE notification (
    user_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE,
    discount_id INTEGER REFERENCES discount (discount_id) ON UPDATE CASCADE,
    notification_id SERIAL PRIMARY KEY,
    item_id INTEGER NOT NULL REFERENCES item(item_id) ON UPDATE CASCADE,
    type notificationType,
    is_seen Boolean DEFAULT False
);


CREATE TABLE apply_discount (
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    discount_id INTEGER NOT NULL REFERENCES discount (discount_id) ON UPDATE CASCADE,
    PRIMARY KEY (item_id, discount_id)
);

CREATE TABLE item_detail (
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    detail_id INTEGER NOT NULL REFERENCES details (detail_id) ON UPDATE CASCADE,
    detail_info text NOT NULL,
    PRIMARY KEY (detail_id, item_id)
);

CREATE TABLE category_detail (
    category_id INTEGER NOT NULL REFERENCES category (category_id) ON UPDATE CASCADE,
    detail_id INTEGER NOT NULL REFERENCES details (detail_id) ON UPDATE CASCADE,
    PRIMARY KEY (category_id, detail_id)
);

CREATE TABLE password_resets(
    email TEXT PRIMARY KEY,
    token TEXT,
    created_at TIMESTAMP
);


-- Indexes

DROP INDEX IF EXISTS item_detail_itemID CASCADE;

CREATE INDEX item_detail_itemID ON item_detail USING btree(item_id);
CLUSTER item_detail using item_detail_itemID;


DROP INDEX IF EXISTS item_price CASCADE;
CREATE INDEX item_price ON item USING btree(price);

DROP INDEX IF EXISTS wishlist_user_id CASCADE;
CREATE INDEX wishlist_user_id ON wishlist USING hash(user_id);

DROP INDEX IF EXISTS cart_user_id CASCADE;
CREATE INDEX cart_user_id ON cart USING hash(user_id);

DROP INDEX IF EXISTS item_review_idx CASCADE;
CREATE INDEX item_review_idx ON review USING btree(item_id);
CLUSTER review using item_review_idx;


DROP INDEX IF EXISTS advertisement_start_date CASCADE;
CREATE INDEX advertisement_start_date ON advertisement USING btree(begin_date);

DROP INDEX IF EXISTS advertisement_end_date CASCADE;
CREATE INDEX advertisement_end_date ON advertisement USING btree(end_date);

DROP INDEX IF EXISTS purchase_user_id CASCADE;
CREATE INDEX purchase_user_id ON purchase USING hash(user_id);

DROP INDEX IF EXISTS item_search_index CASCADE;
CREATE INDEX item_search_index ON item USING GIN (search);

-- Triggers


-- Trigger 1
DROP FUNCTION if exists remove_cart_and_wishlist CASCADE;
DROP TRIGGER if exists remove_archived_from_cart_and_wishlist ON item CASCADE;
CREATE FUNCTION remove_cart_and_wishlist() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF (OLD.is_archived <> NEW.is_archived) THEN
        DELETE FROM wishlist WHERE item_id = NEW.item_id;
	END IF;
    RETURN NEW;
END
$BODY$

LANGUAGE plpgsql;
CREATE TRIGGER remove_archived_from_cart_and_wishlist
AFTER UPDATE ON item
FOR EACH ROW
EXECUTE PROCEDURE remove_cart_and_wishlist();


-- Trigger 2
DROP FUNCTION if exists add_stock_notification CASCADE;
DROP TRIGGER if exists stock_notif ON item CASCADE;
CREATE FUNCTION add_stock_notification() RETURNS TRIGGER AS

$BODY$
BEGIN
    IF ( NEW.stock > OLD.stock) THEN
        IF(OLD.stock = 0) THEN
            INSERT INTO notification (user_id, discount_id, item_id, type)
            SELECT users.user_id, NULL, NEW.item_id, 'Stock'
            FROM users INNER JOIN wishlist using(user_id)
            WHERE wishlist.item_id = NEW.item_id;
        END IF;
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER stock_notif
AFTER UPDATE ON item
FOR EACH ROW
EXECUTE PROCEDURE add_stock_notification();


-- Trigger 3
DROP FUNCTION if exists update_score CASCADE;
DROP TRIGGER if exists score_on_review ON review CASCADE;
CREATE FUNCTION update_score() RETURNS TRIGGER AS

$BODY$
BEGIN
    UPDATE item
    SET score = 
    (SELECT AVG(rating)
    FROM review
    WHERE review.item_id = NEW.item_id)
    WHERE item_id = NEW.item_id;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER score_on_review 
AFTER INSERT ON review
FOR EACH ROW
EXECUTE PROCEDURE update_score();


-- Trigger 4
DROP FUNCTION if exists update_score_change_review CASCADE;
DROP TRIGGER if exists score_on_review_change ON review CASCADE;
CREATE FUNCTION update_score_change_review () RETURNS TRIGGER AS

$BODY$
BEGIN
    IF (NEW.rating <> OLD.rating) THEN
        UPDATE item
        SET score = 
        (SELECT AVG(rating)
        FROM review
        WHERE review.item_id = NEW.item_id)
        WHERE item_id = NEW.item_id;
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER score_on_review_change
AFTER UPDATE ON review
FOR EACH ROW
EXECUTE PROCEDURE update_score_change_review();


--Trigger 5
DROP FUNCTION if exists update_score_delete CASCADE;
DROP TRIGGER if exists score_on_review_delete ON review CASCADE;
CREATE FUNCTION update_score_delete() RETURNS TRIGGER AS

$BODY$
BEGIN
    UPDATE item
    SET score = 
    COALESCE((SELECT AVG(rating)
    FROM review
    WHERE review.item_id = OLD.item_id), 0)
    WHERE item_id = OLD.item_id;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER score_on_review_delete
AFTER DELETE ON review
FOR EACH ROW
EXECUTE PROCEDURE update_score_delete();


--Trigger 6
DROP TRIGGER IF EXISTS update_item_tsvector ON item;
DROP FUNCTION IF EXISTS update_item_tsvector() CASCADE;
CREATE FUNCTION update_item_tsvector() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF pg_trigger_depth() <=1 THEN 
            update item 
	    set search = setweight(to_tsvector('english',coalesce(item.name,'')), 'A') ||
	    setweight(to_tsvector('english',coalesce(item.description,'')), 'B')
	    where new.item_id=item.item_id;
	END IF;
    RETURN NEW;

END

$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER update_item_tsvector
AFTER INSERT OR UPDATE ON item
FOR EACH ROW
EXECUTE PROCEDURE update_item_tsvector();


--Trigger 7
DROP TRIGGER IF EXISTS update_item_tsvector_detail ON item_detail;
DROP FUNCTION IF EXISTS update_item_tsvector_detail() CASCADE;
CREATE FUNCTION update_item_tsvector_detail() RETURNS TRIGGER AS
$BODY$
BEGIN
    update item 
	
	set search = setweight(to_tsvector('english',coalesce(item.name,'')), 'A') ||
	setweight(to_tsvector('english',coalesce(item.description,'')), 'B') || setweight(to_tsvector('english',coalesce(s.detail_info,'')), 'C')
	from 
	(
		
		select string_agg(detail_info, ' ') as detail_info
		from item_detail
		where new.item_id=item_detail.item_id
	) as s
	where new.item_id=item.item_id;
    RETURN NEW;
END
$BODY$


LANGUAGE plpgsql;
CREATE TRIGGER update_item_tsvector_detail
AFTER INSERT OR UPDATE ON item_detail
FOR EACH ROW
EXECUTE PROCEDURE update_item_tsvector_detail();



--Trigger 8
DROP FUNCTION if exists remove_banned_user_comments CASCADE;
DROP TRIGGER if exists remove_banned_user_comments ON ban CASCADE;
CREATE FUNCTION remove_banned_user_comments() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM review WHERE review.user_id = NEW.user_id;
	
	UPDATE item 
    Set stock = item.stock + joined_cart.quantity
    FROM (cart INNER JOIN item using(item_id)) as joined_cart
    where user_id = NEW.user_id AND joined_cart.user_id = NEW.user_id AND joined_cart.item_id = item.item_id;
	
    DELETE FROM cart
    WHERE user_id = NEW.user_id;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_banned_user_comments
AFTER INSERT ON ban
FOR EACH ROW
EXECUTE PROCEDURE remove_banned_user_comments();


--Trigger 9
DROP TRIGGER if exists check_if_already_on_cart ON cart CASCADE;
DROP FUNCTION if exists check_if_already_on_cart CASCADE;

CREATE FUNCTION check_if_already_on_cart() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF(EXISTS (SELECT * FROM cart WHERE (NEW.user_id = cart.user_id AND NEW.item_id = cart.item_id)))
	THEN
		UPDATE cart
		SET quantity = quantity + NEW.quantity
		WHERE NEW.user_id = cart.user_id AND NEW.item_id = cart.item_id;
		RETURN NULL;
	END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER check_if_already_on_cart
BEFORE INSERT ON cart
FOR EACH ROW
EXECUTE PROCEDURE check_if_already_on_cart();

--Trigger 10
DROP FUNCTION if exists notify_admin_if_out_of_stock CASCADE;
DROP TRIGGER if exists notify_admin ON item CASCADE;
CREATE FUNCTION notify_admin_if_out_of_stock() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF (NEW.stock = 0 AND OLD.stock <> 0) THEN
        INSERT INTO notification(user_id, discount_id, item_id, type)
        SELECT users.user_id, NULL, NEW.item_id, 'Stock'
        FROM users 
        WHERE users.is_admin = TRUE;
    END IF;
    RETURN NEW;
END
$BODY$

LANGUAGE plpgsql;
CREATE TRIGGER notify_admin
AFTER UPDATE ON item
FOR EACH ROW
EXECUTE PROCEDURE notify_admin_if_out_of_stock();

--Trigger 11
DROP FUNCTION if exists update_stock_remove_from_cart CASCADE;
DROP TRIGGER if exists update_stock_remove_from_cart ON cart CASCADE;
CREATE FUNCTION update_stock_remove_from_cart() RETURNS TRIGGER AS
$BODY$
BEGIN
    UPDATE item
    SET stock = stock + OLD.quantity
    WHERE item.item_id = OLD.item_id;
    RETURN OLD;
END
$BODY$

LANGUAGE plpgsql;
CREATE TRIGGER update_stock_remove_from_cart
AFTER DELETE ON cart
FOR EACH ROW
EXECUTE PROCEDURE update_stock_remove_from_cart();

--Trigger 12
DROP FUNCTION if exists update_stock_update_quantity_cart CASCADE;
DROP TRIGGER if exists update_stock_update_quantity_cart ON cart CASCADE;
CREATE FUNCTION update_stock_update_quantity_cart() RETURNS TRIGGER AS
$BODY$
BEGIN
    UPDATE item
    SET stock = stock - (NEW.quantity - OLD.quantity)
    WHERE item.item_id = OLD.item_id;
    RETURN NEW;
END
$BODY$

LANGUAGE plpgsql;
CREATE TRIGGER update_stock_update_quantity_cart
BEFORE UPDATE ON cart
FOR EACH ROW
EXECUTE PROCEDURE update_stock_update_quantity_cart();

--Rule 1
DROP rule IF EXISTS users_delete_rule ON users CASCADE;
CREATE RULE users_delete_rule
AS ON DELETE TO users
DO INSTEAD (
    UPDATE item 
    Set stock = item.stock + joined_cart.quantity
    FROM (cart INNER JOIN item using(item_id)) as joined_cart
    where user_id = OLD.user_id AND joined_cart.user_id = OLD.user_id AND joined_cart.item_id = item.item_id;
    DELETE FROM cart
    WHERE user_id = OLD.user_id;
    UPDATE users
	SET first_name = null,
    last_name = null,
    username = null,
	email = null,
    password = null,
    deleted = true,
    is_admin = false,
    balance = 0
    WHERE OLD.user_id = user_id;
	DELETE FROM photo
	WHERE photo_id = OLD.img;
    DELETE FROM address
    WHERE address_id = OLD.shipping_address OR address_id = OLD.billing_address;
);


--Transactions

--Transaction 1

CREATE OR REPLACE PROCEDURE add_to_cart(userID INTEGER, itemID INTEGER, quantityBought INTEGER)
LANGUAGE plpgsql AS $$
DECLARE
BEGIN
    PERFORM item_id
    FROM cart
    WHERE user_id = userID AND item_id = itemID;

    IF NOT found THEN
        IF (
        SELECT stock 
        FROM item 
        WHERE item_id = itemID) >= quantityBought 
        THEN
    	    UPDATE item 
            SET stock = stock - quantityBought 
            WHERE item_id = itemID; 
    
            INSERT INTO cart
            VALUES(userID, itemID, now()::DATE, quantityBought);
            
        END IF;
    ELSE 
        IF (
            SELECT stock 
            FROM item 
            WHERE item_id = itemID) >= quantityBought 
        THEN
    	    UPDATE item 
            SET stock = stock - quantityBought 
            WHERE item_id = itemID; 
    
            UPDATE cart
            SET quantity = quantity + quantityBought;
            
        END IF;
    END IF;
END
$$;


--Transaction 2

DROP FUNCTION if exists get_discount CASCADE;
CREATE FUNCTION get_discount(i INTEGER, d TIMESTAMP WITH TIME ZONE) 
RETURNS INTEGER AS 
$$
DECLARE item_discount INTEGER := 0;
BEGIN
    if(d = NULL)
        d := now();
    end if;
    
    SELECT max(discount.percentage) INTO item_discount
    FROM apply_discount JOIN discount USING (discount_id)
    WHERE item_id = i AND begin_date <= d AND end_date >= d;
    
    if(item_discount IS NULL) then
        RETURN 0;
    else
        return item_discount;
    end if;
END;
$$ 
LANGUAGE plpgsql;

CREATE OR REPLACE PROCEDURE checkout(userID INTEGER, billing INTEGER, shipping INTEGER)
LANGUAGE plpgsql AS $$
DECLARE 
sum_prices MONEY := 0::MONEY;
purchase_ident INTEGER := 0;
BEGIN
    SELECT sum((price - (price*get_discount(item_id, now())/100)) * quantity) INTO sum_prices
    FROM item JOIN cart USING (item_id)
    WHERE cart.user_id = userID;
         
    IF (
        
        (SELECT balance 
        FROM users
        WHERE user_id = userID)
        -
        (sum_prices)
        >= 0::MONEY
        )
        THEN 
        
            UPDATE users
            SET balance = balance - sum_prices
            WHERE user_id = userID;

            INSERT INTO purchase(user_id,date,billing_address,shipping_address) VALUES (userID, now(), billing, shipping) RETURNING purchase_id INTO purchase_ident;

            INSERT INTO purchase_item (purchase_id, item_id, price, quantity)
                SELECT purchase_ident, item_id, price-((price*get_discount(item_id, now()))/100), quantity
                FROM item JOIN cart USING (item_id)
                WHERE user_id = userID;
        
    END IF;
END
$$;