DROP TABLE IF EXISTS country;
CREATE TABLE country (
    country_id SERIAL PRIMARY KEY,
    name text NOT NULL CONSTRAINT country_name_uk UNIQUE
); 

DROP TABLE IF EXISTS photo;
CREATE TABLE photo (
    photo_id SERIAL PRIMARY KEY,
    path text NOT NULL 
);

DROP TABLE IF EXISTS address;
CREATE TABLE address (
    address_id SERIAL PRIMARY KEY,
    city text NOT NULL,
    street text NOT NULL,
    zip_code text NOT NULL,
    country_id INTEGER REFERENCES country(country_id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username text NOT NULL CONSTRAINT username_uk UNIQUE,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    first_name text NOT NULL,
    last_name text NOT NULL,
    password text NOT NULL,
    deleted BOOLEAN DEFAULT FALSE,
    img INTEGER REFERENCES photo(photoID) ON UPDATE CASCADE,
    billingAddress INTEGER REFERENCES address(addressID) ON UPDATE CASCADE,
    shippingAddress INTEGER REFERENCES address(addressID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
    admin_id INTEGER REFERENCES users(user_id) ON UPDATE CASCADE PRIMARY KEY
);

DROP TABLE IF EXISTS authenticated;
CREATE TABLE authenticated (
    authenticated_id INTEGER REFERENCES user(userID) ON UPDATE CASCADE PRIMARY KEY,
    balance money DEFAULT 0 NOT NULL
);
 
DROP TABLE IF EXISTS review;
CREATE TABLE review (
    review_id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES authenticated(authenticated_id) ON UPDATE CASCADE,
    comment text,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    rating INTEGER NOT NULL CONSTRAINT rating_ck CHECK (((rating > 0) AND (rating <= 5)))
);

DROP TABLE IF EXISTS category;
CREATE TABLE category (
    category_id SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);
 
DROP TABLE IF EXISTS details;
CREATE TABLE detail (
    detail_id SERIAL PRIMARY KEY,
    name text NOT NULL UNIQUE
);

DROP TABLE IF EXISTS item;
CREATE TABLE item (
    item_id SERIAL PRIMARY KEY,
    name text NOT NULL,
    stock INTEGER NOT NULL CONSTRAINT pos_stock CHECK (stock >= 0),
    brief_description text,
    description text NOT NULL,
    price MONEY NOT NULL CONSTRAINT pos_price CHECK (price >= 0::MONEY),
    is_archived BOOLEAN NOT NULL DEFAULT false,
    category_id INTEGER REFERENCES category (category_id) ON UPDATE CASCADE
);
 
DROP TABLE IF EXISTS ban;
CREATE TABLE ban (
    admin_id INTEGER NOT NULL REFERENCES admin(admin_id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL REFERENCES user (user_id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    reason text NOT NULL,
    PRIMARY KEY (adminID, userID)
);

DROP TABLE IF EXISTS purchase;
CREATE TABLE purchase (
    purchase_id SERIAL PRIMARY KEY,
    userID INTEGER REFERENCES authenticated (authenticated_id) ON UPDATE CASCADE,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);
 
DROP TABLE IF EXISTS purchase_item;
CREATE TABLE purchase_item (
    purchase_id INTEGER NOT NULL REFERENCES purchase (purchase_id) ON UPDATE CASCADE,
    itemID INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    price MONEY NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (purchase_id, item_id)
);

DROP TABLE IF EXISTS advertisement;
CREATE TABLE advertisement (
    advertisement_id INTEGER PRIMARY KEY,
    title text NOT NULL,
    begin_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    end_date TIMESTAMP WITH TIME zone NOT NULL,
    photo_id INTEGER REFERENCES photo (photo_id) ON UPDATE CASCADE,
    CONSTRAINT ad_dates_ck CHECK (begin_date < end_date)
);

DROP TABLE IF EXISTS item_photo;
CREATE TABLE item_photo (
    photo_id INTEGER NOT NULL REFERENCES photo (photo_id) ON UPDATE CASCADE PRIMARY KEY,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE

);
 
DROP TABLE IF EXISTS cart;
CREATE TABLE cart (
    user_id INTEGER REFERENCES authenticated (authenticated_id) ON UPDATE CASCADE,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    add_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    quantity INTEGER NOT NULL CONSTRAINT quantity_more_zero CHECK (quantity > 0),
    PRIMARY KEY (user_id, item_id)
);
 
DROP TABLE IF EXISTS wishlist;
CREATE TABLE wishlist (
    user_id INTEGER REFERENCES authenticated (authenticated_id) ON UPDATE CASCADE,
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    add_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    PRIMARY KEY (userID, itemID)
);

DROP TABLE IF EXISTS discount;
CREATE TABLE discount (
    discount_id SERIAL PRIMARY KEY,
    "percentage" INTEGER NOT NULL CONSTRAINT valid_percentage CHECK ((("percentage" > 0) AND ("percentage" <= 100))),
    begin_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    end_date TIMESTAMP WITH TIME zone NOT NULL,
    CONSTRAINT ad_dates_ck CHECK (beginDate < endDate)
);

DROP TABLE IF EXISTS "notification";
CREATE TABLE "notification" (
    notification_id SERIAL PRIMARY KEY
    
);

DROP TABLE IF EXISTS discount_notification;
CREATE TABLE discount_notification (
    notification_id INTEGER NOT NULL REFERENCES discount (discount_id) ON UPDATE CASCADE PRIMARY KEY,
    discount_id INTEGER NOT NULL REFERENCES discount (discount_id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS stock_notification;
CREATE TABLE stock_notification (
    notification_id SERIAL PRIMARY KEY
);

DROP TABLE IF EXISTS apply_discount;
CREATE TABLE apply_discount (
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    discount_id INTEGER NOT NULL REFERENCES discount (discount_id) ON UPDATE CASCADE,
    PRIMARY KEY (itemID, discountID)
);

DROP TABLE IF EXISTS item_detail;
CREATE TABLE itemDetail (
    item_id INTEGER NOT NULL REFERENCES item (item_id) ON UPDATE CASCADE,
    detail_id INTEGER NOT NULL REFERENCES detail (detail_id) ON UPDATE CASCADE,
    detail_info text NOT NULL,
    PRIMARY KEY (detail_id, item_id)
);

DROP TABLE IF EXISTS category_detail;
CREATE TABLE category_detail (
    category_id INTEGER NOT NULL REFERENCES category (category_id) ON UPDATE CASCADE,
    detail_id INTEGER NOT NULL REFERENCES detail (detail_id) ON UPDATE CASCADE,
    PRIMARY KEY (category_id, detail_id)
);