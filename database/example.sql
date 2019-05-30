/*
CHAR
VARCHAR
TINYTEXT
MEDUIMTEXT
TEXT
LONGTEXT
DATE      1000-01-01 ~ 9999-12-31
DATETIME  1000-01-01 00:00:00 ~ 9999-12-31 23:59:59
TIMESTAMP  19700101080001 ~ 20380119111407

NOW()

FOREIGN KEY (parent_id) REFERENCES parent(id)
                     ON DELETE CASCADE

 */

drop database if exists `sample`;
create database `sample` charset=utf8;

use `sample`;

drop table if exists `status`;
create table `status`
(
  id tinyint(4) unsigned primary key auto_increment,
  name varchar(24) not null,
  create_time datetime not null,
  update_time datetime not null
);

insert into `status` values(null, '正常', NOW(), NOW()),
  (null, '禁用', NOW(), NOW()),
  (null, '公开', NOW(), NOW()),
  (null, '内部', NOW(), NOW()),
  (null, '私有', NOW(), NOW()),
  (null, '有效', NOW(), NOW()),
  (null, '已失效', NOW(), NOW()),
  (null, '已使用', NOW(), NOW()),
  (null, '待处理', NOW(), NOW()),
  (null, '已拒绝', NOW(), NOW()),
  (null, '已通过', NOW(), NOW()),
  (null, '未关注', NOW(), NOW()),
  (null, '已关注', NOW(), NOW()),
  (null, '已删除', NOW(), NOW()),
  (null, '未注册', NOW(), NOW()),
  (null, '已注册', NOW(), NOW()),
  (null, '普通通知', NOW(), NOW()),
  (null, '警告通知', NOW(), NOW()),
  (null, '紧急通知', NOW(), NOW());

drop table if exists `user`;
create table `user`
(
  id int(10) unsigned primary key auto_increment,
  nickname varchar(24),
  realname varchar(24),
  identification varchar(18),
  avatar varchar(32),
  birthday datetime,
  birthplace varchar(32),
  nationality varchar(32),
  occupation varchar(32),
  email varchar(32) not null,
  mobile varchar(15),
  gender tinyint(4) unsigned,
  description text,
  rate int(10) unsigned not null default 0,
  register_time datetime not null,
  register_ip bigint(20) not null,
  last_login_time datetime not null,
  last_login_ip bigint(20) not null,
  status_id tinyint(4) unsigned not null DEFAULT 1,
  is_completed tinyint(4) unsigned not null default 0,
  update_time datetime not null,
  foreign key (status_id) references status(id)
);

drop table if exists `user_follower`;
create table `user_follower`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  follower_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  status_id tinyint(4) unsigned not null DEFAULT 13,
  foreign key (user_id) references user(id),
  foreign key (follower_id) references user(id)
);

drop table if exists `institution`;
create table `institution`
(
  id int(10) unsigned primary key auto_increment,
  name varchar(24) not null,
  rate int(10) unsigned not null default 0,
  create_time datetime not null,
  update_time datetime not null
);

drop table if exists `user_institution`;
create table `user_institution`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  institution_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (institution_id) references institution(id)
);

drop table if exists `speciality`;
create table `speciality`
(
  id int(10) unsigned primary key auto_increment,
  name varchar(24) not null,
  rate int(10) unsigned not null default 0,
  create_time datetime not null,
  update_time datetime not null
);

drop table if exists `user_speciality`;
create table `user_speciality`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  speciality_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (speciality_id) references speciality(id)
);

drop table if exists `hobby`;
create table `hobby`
(
  id int(10) unsigned primary key auto_increment,
  name varchar(24) not null,
  rate int(10) unsigned not null default 0,
  create_time datetime not null,
  update_time datetime not null
);

drop table if exists `user_hobby`;
create table `user_hobby`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  hobby_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (hobby_id) references hobby(id)
);

drop table if exists `admin`;
create table `admin`
(
  id int(10) unsigned primary key auto_increment,
  username varchar(32) not null,
  password varchar(32) not null
);

insert into `admin` values(null, 'admin', md5('admin'));

drop table if exists `identity_type`;
create table `identity_type`
(
  id tinyint(4) unsigned primary key auto_increment,
  name varchar(24) not null,
  create_time datetime not null,
  update_time datetime not null
);

insert into `identity_type` values(null, '邮箱', NOW(), NOW()),
  (null, '手机', NOW(), NOW()),
  (null, '身份证', NOW(), NOW());

drop table if EXISTS `user_authentication`;
create table `user_authentication`
(
  id int(10) unsigned  primary key auto_increment,
  user_id int(10) unsigned  not null,
  identity_type_id tinyint(4) unsigned not null,
  identifier varchar(32) not null,
  credential char(32) not null,
  is_verified tinyint(4) not null default 0,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id)
);

drop table if exists `resource`;
create table `resource`
(
  id bigint(20) unsigned primary key auto_increment,
  savename varchar(24) not null,
  type varchar(24) not null,
  ext varchar(12) not null,
  size bigint(20) unsigned not null,
  savepath varchar(32) not null,
  md5 char(32) not null,
  sha1 char(40) not null,
  rate bigint(20) unsigned not null default 0,
  upload_ip bigint(20) not null,
  upload_time datetime not null
);

drop table if exists `user_resource`;
create table `user_resource`
(
  id bigint(20) unsigned primary key auto_increment,
  realname varchar(24) not null,
  user_id int(10) unsigned not null,
  resource_id bigint(20) unsigned not null,
  status_id tinyint(4) unsigned not null DEFAULT 3,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (resource_id) references resource(id),
  foreign key (status_id) references status(id)
);

drop table if exists `verify_code`;
create table `verify_code`
(
  id tinyint(4) unsigned primary key auto_increment,
  code varchar(24) not null,
  user_authentication_id int(10) unsigned not null,
  status_id tinyint(4) unsigned not null DEFAULT 6,
  create_time datetime not null,
  expire_time datetime not null,
  foreign key (status_id) references status(id),
  foreign key (user_authentication_id) references user_authentication(id) on delete cascade
);

drop table if exists `id_auth_request`;
create table `id_auth_request`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  user_authentication_id int(10) unsigned not null,
  realname varchar(24) not null,
  identification varchar(18) not null,
  avatar varchar(32),
  id_front_img varchar(32),
  id_back_img varchar(32),
  request_time datetime not null,
  request_ip bigint(20) not null,
  status_id tinyint(4) unsigned not null DEFAULT 9,
  update_time datetime not null,
  foreign key (status_id) references status(id),
  foreign key (user_id) references user(id),
  foreign key (user_authentication_id) references user_authentication(id) on delete cascade
);

drop table if exists `security_question`;
create table `security_question`
(
  id bigint(20) unsigned primary key auto_increment,
  question varchar(32),
  rate bigint(20) unsigned not null default 0,
  create_time datetime not null
);

insert into `security_question` values(null, '您母亲的姓名是？', null, now()),
                                       (null, '您父亲的姓名是？', null, now()),
                                       (null, '您配偶的名字是？', null, now()),
                                       (null, '您配偶的生日是？', null, now()),
                                       (null, '小学学校是？', null, now()),
                                       (null, '初中学校是？', null, now()),
                                       (null, '高中学校是？', null, now()),
                                       (null, '大学学校是？', null, now()),
                                       (null, '您的生日是？', null, now()),
                                       (null, '您的出生地是？', null, now()),
                                       (null, '对您影响最大的人名字是？', null, now()),
                                       (null, '您最熟悉的好友名字是？', null, now()),
                                       (null, '您最喜欢的颜色是？', null, now()),
                                       (null, '您最喜欢的食物是？', null, now()),
                                       (null, '您的爱好是？', null, now()),
                                       (null, '您曾经的梦想是？', null, now());

drop table if exists `user_security_question`;
create table `user_security_question`
(
  id bigint(20) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  question_id bigint(20) unsigned not null,
  answer char(32) not null,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (question_id) references security_question(id)
);

drop table if exists `course`;
create table `course`
(
  id int(10) unsigned primary key auto_increment,
  name varchar(24) not null,
  avatar varchar(32) not null,
  description text,
  welcome_message text,
  creator_id int(10) unsigned not null,
  rate int(10) unsigned not null default 0,
  registered_users int(10) unsigned not null default 0,
  status_id tinyint(4) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (creator_id) references user(id),
  foreign key (status_id) references status(id)
);

drop table if exists `tag`;
create table `tag`
(
  id bigint(20) unsigned primary key auto_increment,
  name varchar(32),
  rate bigint(20) unsigned not null default 0,
  create_time datetime not null
);

drop table if exists `course_tag`;
create table `course_tag`
(
  id bigint(20) unsigned primary key auto_increment,
  course_id int(10) unsigned not null,
  tag_id bigint(20) unsigned not null,
  create_time datetime not null,
  foreign key (course_id) references course(id) on delete cascade,
  foreign key (tag_id) references tag(id) on delete cascade
);

drop table if exists `course_follower`;
create table `course_follower`
(
  id int(10) unsigned primary key auto_increment,
  course_id int(10) unsigned not null,
  follower_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  status_id tinyint(4) unsigned not null DEFAULT 13,
  foreign key (course_id) references course(id),
  foreign key (status_id) references status(id),
  foreign key (follower_id) references user(id)
);

drop table if exists `course_registrant`;
create table `course_registrant`
(
  id int(10) unsigned primary key auto_increment,
  course_id int(10) unsigned not null,
  registrant_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  status_id tinyint(4) unsigned not null DEFAULT 16,
  foreign key (course_id) references course(id),
  foreign key (status_id) references status(id),
  foreign key (registrant_id) references user(id)
);


drop table if exists `course_notification`;
create table `course_notification`
(
  id bigint(20) unsigned primary key auto_increment,
  title varchar(32) not null,
  notification text not null,
  course_id int(10) unsigned not null,
  create_time datetime not null,
  update_time datetime not null,
  status_id tinyint(4) unsigned not null,
  foreign key (course_id) references course(id),
  foreign key (status_id) references status(id)
);

drop table if exists `user_notification`;
create table `user_notification`
(
  id bigint(20) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  notification_id bigint(20) unsigned not null,
  create_time datetime not null,
  foreign key (notification_id) references course_notification(id),
  foreign key (user_id) references user(id)
);

drop table if exists `course_register_request`;
create table `course_register_request`
(
  id int(10) unsigned primary key auto_increment,
  user_id int(10) unsigned not null,
  course_id int(10) unsigned not null,
  status_id tinyint(4) unsigned not null DEFAULT 9,
  create_time datetime not null,
  update_time datetime not null,
  foreign key (user_id) references user(id),
  foreign key (course_id) references course(id) on delete cascade,
  foreign key (status_id) references status(id)
);