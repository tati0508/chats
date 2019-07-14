create database chats default charset utf8;

// ユーザがまだ作られていない場合は grant 文を実行する
grant all privileges on *.* to myuser@'%' identified by 'password' with grant option;

create table users(
  id int not null auto_increment primary key,
  name varchar(255) not null,
  login_id varchar(255) not null unique,
  password varchar(255) not null
);

create table messages(
  id int not null auto_increment primary key,
  message varchar(255),
  user_id int not null,
  foreign key(user_id) references users(id)
);

create table numbers(
  id int not null auto_increment primary key,
  number int not null
);