insert into department (department_name) values ('IT отдел');
insert into department (department_name) values ('Бухгалтерия');
insert into department (department_name) values ('Менеджеры');
insert into department (department_name) values ('Руководство');

insert into position (position_name, id_departments) values ('Начальник IT отдела',1);
insert into position (position_name, id_departments) values ('Ведущий программист',1);
insert into position (position_name, id_departments) values ('Программист стажер',1);


insert into position (position_name, id_departments) values ('Начальник отдела бухгалтерии',2);
insert into position (position_name, id_departments) values ('Бухгалтер',2);


insert into position (position_name, id_departments) values ('Начальник отдела менеджмента',4);
insert into position (position_name, id_departments) values ('менеджер',4);


insert into position (position_name, id_departments) values ('Директор',5);
insert into position (position_name, id_departments) values ('Заместитель директора',5);


insert into application_type (appl_type_name) values ('Установка программ\софта');
insert into application_type (appl_type_name) values ('Некорректная работа программ\софта');
insert into application_type (appl_type_name) values ('Помощь в использование\настройке программы\софта');
insert into application_type (appl_type_name) values ('Поломка компьютера (физическая)');
insert into application_type (appl_type_name) values ('Поломка клавиатуры, мыши, принтера итд.');
insert into application_type (appl_type_name) values ('Проблемы в работе компьютера (зависания, некорректная работа)');
insert into application_type (appl_type_name) values ('Проблемы с интернетом\отсутствие интернета');

insert into application (client_fio, id_application_types, id_position, urgency, description) values ('Белов Дмитрий Павлович', 6, 1, 1, 'Памагити! Кампуктир сламанался!! Ничиго ни работат! Пишу с домофона!');

insert into employee (employee_name, employee_type, nickname, password) values ('Петров Петр Петрович', false, 'PPetrov', '1111') --Поздне будет храниться хэшированный пароль,type: false - service desk, true - manager