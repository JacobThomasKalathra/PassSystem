--------------------------------------------------------
--  File created - Tuesday-July-26-2022   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for DB Link EMREF10G.PEOPLESOFT.COM
--------------------------------------------------------

  CREATE DATABASE LINK "EMREF10G.PEOPLESOFT.COM"
   CONNECT TO "EMDBO" IDENTIFIED BY VALUES ':1'
   USING '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521)))(CONNECT_DATA=(SID=emrefrdb)))';
--------------------------------------------------------
--  DDL for Sequence ID_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "EMDBO"."ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 681 CACHE 20 NOORDER  NOCYCLE  NOPARTITION ;
--------------------------------------------------------
--  DDL for Table BASE
--------------------------------------------------------

  CREATE TABLE "EMDBO"."BASE" 
   (	"GRP" VARCHAR2(20 BYTE), 
	"SUBGRP" VARCHAR2(20 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table EM_DB_LIST
--------------------------------------------------------

  CREATE TABLE "EMDBO"."EM_DB_LIST" 
   (	"DBNAME" VARCHAR2(30 BYTE), 
	"TOOLSREL" VARCHAR2(30 BYTE), 
	"PSRELEASE" VARCHAR2(50 BYTE), 
	"LASTACCESSED" DATE, 
	"STATUS" VARCHAR2(20 BYTE), 
	"EXPIRATION_DATE" DATE, 
	"SLOT_OWNER" VARCHAR2(20 BYTE), 
	"LOGMODE" VARCHAR2(20 BYTE), 
	"ALLOCATED" NUMBER(6,3), 
	"USED" NUMBER(6,3), 
	"TOTALUSED" NUMBER(6,3), 
	"AVAILABLE" NUMBER(6,3), 
	"USEDPCT" NUMBER(6,3), 
	"FILERNAME" VARCHAR2(20 BYTE), 
	"SQLNET30" NUMBER, 
	"SQLNET90" NUMBER, 
	"SQLNET180" NUMBER, 
	"SQL_LAST_DATE" VARCHAR2(30 BYTE), 
	"RUN_DATE" DATE
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "EMREFRESHDB" ;
--------------------------------------------------------
--  DDL for Table EM_OPRDEFN_TBL
--------------------------------------------------------

  CREATE TABLE "EMDBO"."EM_OPRDEFN_TBL" 
   (	"DBNAME" VARCHAR2(30 BYTE), 
	"OPRID" VARCHAR2(30 BYTE), 
	"OPERPSWD" VARCHAR2(30 BYTE), 
	"DBO_ALIAS" VARCHAR2(1 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "EMREFRESHDB" ;
--------------------------------------------------------
--  DDL for Table PASSWORD_LIST
--------------------------------------------------------

  CREATE TABLE "EMDBO"."PASSWORD_LIST" 
   (	"ID" NUMBER, 
	"USERID" VARCHAR2(40 BYTE), 
	"PASSWORD" VARCHAR2(200 BYTE), 
	"GRP" VARCHAR2(40 BYTE), 
	"SUBGRP" VARCHAR2(40 BYTE), 
	"DESCRIPTION" VARCHAR2(200 BYTE), 
	"COMPONENT" VARCHAR2(100 CHAR)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "PSDEFAULT" ;
--------------------------------------------------------
--  DDL for Table USER_LIST
--------------------------------------------------------

  CREATE TABLE "EMDBO"."USER_LIST" 
   (	"PASSWORD" VARCHAR2(20 BYTE) DEFAULT 'P@ssw0rd', 
	"GRP" VARCHAR2(20 BYTE), 
	"SUBGROUP" VARCHAR2(20 BYTE), 
	"ADMIN" VARCHAR2(1 BYTE) DEFAULT 'N', 
	"SADMIN" VARCHAR2(1 BYTE) DEFAULT 'N', 
	"EMAIL" VARCHAR2(50 CHAR)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for View OPRDEFN_DEP_VW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "EMDBO"."OPRDEFN_DEP_VW" ("DBNAME", "OPRID", "OPERPSWD", "DBO_ALIAS") AS 
  (
select "DBNAME","OPRID","OPERPSWD","DBO_ALIAS" from em_oprdefn_tbl where upper(dbname) not like '%MST' and upper(dbname) not like '%STG' and upper(DBNAME) != 'EM_CONNECT' and DBO_ALIAS='Y');
REM INSERTING into EMDBO.BASE
SET DEFINE OFF;
Insert into EMDBO.BASE (GRP,SUBGRP) values ('JD-Edwards','COMMON');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('PeopleSoft','COMMON');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('PeopleSoft','DEV');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('PeopleSoft','OSS');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('PeopleSoft','PROD');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('PeopleSoft','QAE');
Insert into EMDBO.BASE (GRP,SUBGRP) values ('Siebel','COMMON');
REM INSERTING into EMDBO.EM_DB_LIST
SET DEFINE OFF;
REM INSERTING into EMDBO.EM_OPRDEFN_TBL
SET DEFINE OFF;
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','SYSSYSTEM','P0werpa55','N');
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','PSBASS','ELV1S','N');
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','PTWEBSERVER','PTWEBSERVER','N');
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','asoduser','as0dpa55','N');
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','PSEM','inv1nc1ble','N');
Insert into EMDBO.EM_OPRDEFN_TBL (DBNAME,OPRID,OPERPSWD,DBO_ALIAS) values ('EM_CONNECT','PSAPPS','PS0AP3','N');
REM INSERTING into EMDBO.PASSWORD_LIST
SET DEFINE OFF;
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (55,'administrator','J+UhNMILAxSXCwes2aiXDW2UdbfuQyfZyJrf1EooVn/nY5AIF8LE9t533EoNnN04UTfJ5rW+cfh9KND4SR3w47dNRpFC0GxccmBRW650sdTMwvk1Vvy+k1DRgJh/bYm0|uwz2JCo8qlXnNIm40vBuNLVlnhmjN9oKqYEz3jVEqRU=','PeopleSoft','OSS','Integration Gateway Common testing for PT848','IB id for PT848');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (56,'administrator','h2vMxRn2VFRfr7iPVskfJutbECMqDJUyzh5e8wk6AwGXSQmaWRJIXfY0ojWm09nitasrnTHNUb+5waYka/BJCubxJExdp4KOmR89YQ4aHrDrjurKx0NMXorGos75nHfT|s0IX9JkT/aDiSE5U4OIAtRDgFySZTzKLq/hNytV2F0E=','PeopleSoft','OSS','Integration Gateway Common testing for PT849','IB id for PT849');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (57,'administrator','qopR8spddGpWrSjBBqqqIcZKZiZaxDgfddydfiglmbJWpCPy4Ld8zVHLaa2PYQJkEHGfFzm/mj2NAtigyY/01ZIRzJjUeXiVwAXxHV1FA5Ov4QpUmPoN1EsGTC8WLbMQ|gV7Equtsp89aTDzHgNLIdmYhpBPlLuX0XX/+gBKpf4k=','PeopleSoft','OSS','Integration Gateway Common testing for PT851','IB id for PT851');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (58,'administrator','u0Yj6V8R3Tdu8V690HBUfUXd6VRzdxrz/LW5B+7QvFoMlzdQRKbLFUDGjJCBdjU2Z5FddLc1eU0rCp57wrbD1xEFt2pgi3/A/tlnKzu1JbXQ+54L/6sIJ00nbjoHpixr|kxuHrM/DcUfs3gt5jrVEhX8pPapt+9nYZ33L0y0HEoA=','PeopleSoft','OSS','Integration Gateway Common testing for PT852','IB id for PT852');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (59,'searchsys','JPBCCVaraM9mT4EsPOoiddJmJbdPQVjzRfe2czSFEOVN1e6OCt2tV1heoWLiOO/NLEvcsaxvzG+OLSbaEyN9guFb0/yEHYiwSOWWMyMnO49bxqc9YHMUXSeQqqEdXhjl|WJ+f92/mD5i4YAYI6EVwmn57uzor+KQfcRPqgvUs2Yo=','PeopleSoft','OSS','Admin user for SES server install for SES 11.2.2 AIX Admin','Admin user for SES ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (60,'sybgsc','Rd0HEanSjQLo+PJA6v3OfEmcrEceMtgH48o7EVJFTwswMi/dfD3ZATn00kjsZWmdnjyDhgkGUMcYLPFnO0Z/kd1kUCyfGvcD/kIkGo5ltJ5xO95mjFonh6mZNqoNb0Ve|7p3zGbDq0+nXtSxFi3xzPmPLFWR8E9QN/Px4Zf0INvg=','PeopleSoft','OSS','OSS client connect for Sybase','Sybase Admin id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (61,'sa','cA24AyE1FzP+wT1hD6LraHZp9kMKmk2f1Lq6pO31Qwet9Bn9K6DNeJ21OhRR2opfzCT2ms53zNpfU3exeBBCusuXbk77JIcagFPepmxjpWTyBdNcBv7+2+b5gdFRgYYL|JNfjvGqqEMIym33Uq7WzfI/cEyy9/vYgPaGG4Y6kptw=','PeopleSoft','OSS','Sybase administrator','Sybase Admin id for server');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (62,'sybase','rnffJN8EJDUDW64kuCC5ajEbzWSz2nXAG4EBA7MePlOwlo3sT/go/0+q4QMTzZsGgmpEm4NIqkOhEK06QfPRl36sKrNmQVC23ido08WI7AokL7UoML5jtHaxjwBBBEK3|r4TMg+V6ym59sDHxeJ2bOI+vhamKuFyd7wZzdF2djU0=','PeopleSoft','OSS','Sybase server login','Sybase admin id for server');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (63,'Admin','m7COr752B7oMUnhdsgaPiTGc6IYgANLKsHXqZjZJvyUc4iLoDJzKcJRT8Bu6qPIpVGXU4jT/wOiN0lSvk4INfJ3YzI8yALofQFQZlDsMVim+NY3Z9mXnmiS8Aq/ZpKB0|FLc/Fvii1igu/uhmKqkxhHWWeYXuXmfj9COi1QtW+Yg=','PeopleSoft','OSS','CEL OVM Manager accessed via Oracle Secure Global Desktop Admin Console','CEL OVM manager id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (64,'SSO','xfl1HwRKoeYJN0q+3LYB7aKSvO6gvO37FcZ6Fsd6SedxLWTaFGM8LN0GZ51dseyS/RVQHirFdpA/Ks1mgKDXqY1/4sBE86F/raSMj5CWjMJnVW3TYuJdh9N+bH7Qlou/|Wjk29PUUZjKj2wk8zbyl0n5cUj6JNuzA4uH4ViJKovg=','PeopleSoft','OSS','CEL Oracle Privileged Account Manager (OPAM) - Default Admin password that must be changed to your unique  password.','OPAM default id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (66,'emadmin','5AEPDiFXzYyu77TStMmyi/xJx6qyQmUgnJ3a4ekUCjqSbBSKuu9qGoH08NANpQloe86auX0HZdH0JNg/N8D4l86g6lryo5zu1sbSMkRMjE2q5IKju8LGMoop/nCmPf6Z|vlzWwxqhK/Ewep6oIcK/Bh8nHqcIrNBwX1zfyZoC140=','PeopleSoft','OSS','emadmin user on Linux for Oracle database refresh/backup','emadmin user for all oracle db');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (67,'db2udb8','49x7UkcyvQseA/1XkDXCiOuCUhlPnVvLXUlPiTO8ShMpMomY2CoVN33WPM67Tl9te6+cgapXh+QMpHQo2vIXsQ1df5rZEzXaObp1ejpYmB/GdLni3UlFo8gHsDnEaeso|g3P/v/Xoib78FvsJF4b12guHIiZ7zq74i46Jh15IJo0=','PeopleSoft','OSS','DB2 Admin ID','db2 admin id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (68,'administrator','CQcPN85J7Zgj9e+Btak+c6uMLrjwesdqiZZU6mPAjhvRcE5BoJepDPhyYRjCS2rds0JSfuYbYqar+aaTHvQu9C9jFsDjbaL2xNobzgdYneIUcIrm68Fd1aalhDjnJ17+|MZLAyvFwFbNLVIltwM0suuSp4E2FeWAj8zitBmcCoFU=','PeopleSoft','OSS','NT Administrator for EMOps','NT Administrator for EMOps');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (69,'Tuxedo','4NhNVn9DroUBePPm075G/8m5bKjzihV3FCOZB3X7q08mXwTFokfqInPMb7j/qIaymg4nGFIziv1CJgMCbuOLgXi0ZKTIZbZrlz7rQ4K70UUO6WvnxnXUDFurrnr/Hdwc|HcCWa3s4iPrlrn/5e8do9MSln+qafhth55sQeDFOp98=','PeopleSoft','OSS','Tuxedo user on Unix','Tuxedo user on Unix');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (70,'pspgsctl','pgx8pMF17LVu8fv3fRGp/x8OTBaHUZLn4Yn+lSdk6Ppxxk7C2eeav49lRmocKNbqVArVklY4G4LMnaO783M7sHulO1ollXRoqEDOYCEtJGSc3+i8zsIn2FB/pWuqJ7yH|FYCkNy2OY7U8ZllNO+7IfrO95VVQWRS+AiKJRuyZRU0=','PeopleSoft','OSS','Public workstation access password','Public workstation access password');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (72,'db2inst1','9R0N7ubOoJW6f3Nz0hHsiNaXWnkFmtvJaXGiAds8SeE9BEVtITPuqrhCqmA5/qXsY1t//2A0x+Qt7aAeSONsZHuqwkotDmFrxprg5XYq4zZj9G9ehS02dR+axTNzBp6j|pi0R2i9PateCZmR0ttZgJ2TKYW6Ee5X0IhzQ3tgDsfU=','PeopleSoft','OSS','Database Manager configuration','db2 manager config ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (73,'oracle','58CVoCvOQmajxqv/DsFEuso+PlL/I+usjhxxhzLDETOthxlTrLAn0mnMvOxGr+qjd1mMnT/pj/CUwtE/0zVzCsvt38UZIPUaOtsZZLU5CkEk7Ya2lSSKMJQ8qCBTe12I|BJKwViJ58jT8di+dYTYgJLQvXjDv/vTGM2gHKxMOMxw=','PeopleSoft','OSS','Oracle connect on Windows','oracle connect on windows');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (74,'Informix','Tgd97hn8Xu2Yft1XTkwzFoItfxRdKcg94DpGXDH7AgQwXdVbfoG7O6uYRqvvZqUaQL8VjaK//IB40ZYCWfZLyUwvIyzfw25ysHuBPJXz4XC9Xn0S8klhl+b/RY3y/Ti+|kFbUM1DNaObG6uEJsXwXF8PQL92XV72+HdrVxMFVML0=','PeopleSoft','OSS','Admin ID for UNIX running Informix','Admin id for Informix UNIX');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (75,'administrator','YdlyrusVCtG6f8bdBDohWt1vz837qPmK1cX5G2r8oQu1lzjdXNxuhAexdgzcF2Kwf/F5adC5R5CyI9y76GVzom59IcFA2pKeEaL56XN2NfKxNnSCJ0/ND88n2KZvgzOk|WR0iE3cUs8WC43txliIYwVEAXwBClw2qQi0gcp0joVU=','PeopleSoft','OSS','Local ID with admin access on NT servers in APAC','NT Administrator for EMOps');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (76,'oracle','GCqWffPKmjvcB6K3kdhQo9yRt9itWrpWORdqngYvKVL6cHnasMMl3qqKClPolfRRB6t2paM+mWWgTS4kMbpOvvDUnz0GhEwIkHncMzA8T00lG6hBWvr/bdYHNINb6tJp|D7xD3qXeLSfDtw2Mh9J8oL7eh9/Crw0+XgnDmTnYVho=','PeopleSoft','OSS','oracle user on UNIX server','oracle user for unix');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (77,'lroot','EKqLCpwpzdh1n8ltFm9YOOhNcePi+XhVcNlXS1bm5JnVipemqDIqv1nihi7fDSqf4B/q2R9Pu5QJ90AwIVLLM3tNujsMPbYlPbItjZjnCdcY//5H48TuCDJJojBX4i76|89suOhltRrLZwE3cL2Amw0H4l55I6R9By9PVQC6tVEk=','PeopleSoft','OSS','Lroot access on our Unix and Linux servers to allow software installation.','lroot access for Unix/Linux');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (78,'EMOYANG','eN0h4nyR3NuEG9pNjWcQtvo8ZcTjIehXFCR6Mb3K72ZPHRF6uNl9T2dWXJAEKfRPaXQN+sNKYJT5XMRM58+zbQ9fGZhc3L6ctKIg3VDCURa/X+6r5bKv4/mOouzzDlpy|xMNJAoBu8vaJOqd6PlrmgcgnUCr4UH66duqPBnTkUF0=','PeopleSoft','OSS','IDC specific user account','IDC specific common id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (80,'sybase','TaJyGh3JE4ZMaYrA5aCc9AEQ4PaySiHtzT8wP6wQM+Fy6iUrUzSqNvpPEUE7a+YfMsypqTXt+r8gvTbUSlSdwVlLqOEvF3QuNeRCNVIMD57Zi/y4iJKZj5yjkcO2InAk|khdO6klFoiPxZkCcmvkOG98+NijZrq50v8GcEHCllRk=','PeopleSoft','OSS','Admin ID for UNIX running Sybase','Sybase Admin id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (81,'administrator','pYf99e3N6LNT/iFxM/sFvAca2guUComHF28QmQyww4wdtGqVSfil2Sq87ako2CqNany+zOWcIQYrOKTH59LBqCFMvqOcdTG8HjLa2ikBA07eoct2O6lpo52bYnxijrXG|LzTifaYi7VwF6bbi24oMDlzDvxd19Il4g7YZAMRgYmQ=','PeopleSoft','OSS','NT Admin for Asia Pacific (For Translations servers only)','Admin for APAC translations');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (82,'emgsclab','+MTcMaBPUaAAN1/djzHBmbmHneg4xFNEkQC/xUSKHeXeApmcWygQX5y8hH+8j6Mg7yT6zLkyLWAL2cse9sPhzvzRVl5lQTBE1j7m/MFRS+m/c2dTfzujoeHHx+3uvKjR|XG1QTHfxlNPAjtY9uo2gKxwWvm6lbxBSuTGAiyqEClM=','PeopleSoft','OSS','Webserver installs on UNIX','webserver install on unix');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (109,'sysman','SkxKxUa9lRL1OichrPwEB5lYj9HpdkFffel3nrS7WNFaVBAUulvAoNF0NXYm3/cM7s267jlvknSakhYUJ/VRcM956yZlwDYmCdLpnAlI2LFjoeiYe+daPk4vXdl+4X4y|ErD8P6Uwrk0QJrs5QvdSzTB+BwwtjUD6AOvBC7fxjuI=','PeopleSoft','OSS','PSEM agent and plug-in with WebLogic 10.3.6','PSEM agent ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (110,'SYSADM','IWjLoEzaoqG8angudfvYKiGtXvGzaLMHzbeqayQdVnzJTmiFheTmwSx3V01nLsYaJGjQIx+rUic45AJm11eUzRQxbpPveJy7BUMFYKq54ZShB2t1x7d6RA4NAA/k7GMI|+VrAajzbpGkwjBfFGUDS2bEFNv0fICLJRHrtNJ6Mdc8=','PeopleSoft','OSS','Access ID and Password for PUM Source Environments that run on Oracle Virtual Box instances.','Access id for PUM source env');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (111,'administrator','uHZSbv5kp8GqdzxKPr6jYJzLrqqf3qz0RbpSAwTVmm0QR3PuleqqIrMrL6Um6nItmhm5olQHSwJfI0zwPjCOPiYdogHyYs4OSWgFRsVbJ/cyL7Zq8EEUr8RRXppIGl0m|aZ4RJskCsRiOd+V7RUFGRGyrtbMF238Evnrsl8vNd7c=','PeopleSoft','OSS','PT8.55 Common Gateway for Secure Enterprise Search','IB Pool ID for PT855 -SES');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (112,'administrator','SKLz19U+Rhp96E3V6NQFlNHyy1BE8A8/QCbV7IPi56qhHe5tKzFHoXW0Ff/DGdyGmGNSheG8jwbvRvK02sk8BZ/ndbX/9woE+URqC0zW0mjDu/N9k1eg/9FdBvBiDOSD|MxqUrSNI3i+up4lEumZqJ6283IB/6i6ME4CgEB8ftPk=','PeopleSoft','OSS','FTP user private to the Team','FTP user id for team');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (113,'FTPUSER','fWUVsxau7kaSTsndz9fJPgI+/k4AHY48/WorhJhSXHsAY923ngbK4qfd2sqQxtOlsRnPPB+roza3eYMFS4IHMtea4v1YpH4Za/rxFkRjSZTUkfWV6IrV4iOaKQr4EHj+|sKr1v/BzPkD5wWVSPVzBGM4QZ4yLnvJn7GozfaD3gDA=','PeopleSoft','OSS','FTP user for public usage including GCS analysts','FTP user id for analyst');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (114,'administrator','VMoDmx6wFzOUz7CWfiaRYbEHA1SHPk0TMbP96JICKK5zzBQ3Q/j2KODK0MmKVBC9fYz2z5UXJF/pJPATZXPfV5LfzwdHgkRCoTLaIJMOZ1KxONkPQALRsDYMdPHzb9m2|dokMTl3/2zN7Jxuvyw0xQ/6Tml6MDgrGEDTRcrZEXyk=','PeopleSoft','OSS','IB Pool gateway','IB Pool ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (115,'people','/oqt50PQht5byVSVgFpwUrChQmyL3Q7AYjU8IZf+EE+JSUwSUzlRQ3Dsc+oezU6hNvcm1GhULeXXjl9BgHjZS3+behLGoBu+hzaW+EWG5F5IShfYmXeHOpNgb4eQIUBO|epRkeeWUS99/v33d9trFnfh7787OH8+XOyJe3Qyjkvw=','PeopleSoft','OSS','User for PeopleSoft Connect Id','PeopleSoft connect ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (116,'emadmin','lirndG6sv9ucPt748jXml/VJlWUpsrboNW85xVwQ+LwBjvvREUdx69DK8n/JFAcYQ25Cw1k71fRY+ZmXihaoI1QbtaAPcdzwjyUgE103YxKjiAq6U24l/rL7wFdnI4JF|MPLxYEnSWcaBo4iKtg5KjExVzWw+a+fiLbT7RpBqF3s=','PeopleSoft','DEV','emadmin user on Linux for Oracle database refresh/backup','Linux user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (117,'SSO without "@oracle.com"','A40NyVspxTYpKi1NSZwLuShLd2FsAqSgGDQjXtNHWqfWOWD1SjztfLOFhra+jzlLRNc8SLV5rhrau+f8LOWcpVpf8n6KNozTi+b8LxcwUFhWY3pt2AjGgS6B9Y/Yc996|2IeqXXd+a6jDhJiNp90iZCthq1DOTa54scqccccKQkQ=','PeopleSoft','DEV','Default Admin password that must be changed to your unique  password.','CEL Oracle Privileged Account Manager (OPAM)');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (118,'SVCREPWB','vfOP1n3z5Y6egrtj/iRINs1YvZvQFSbk5vxBVuFxOB1XTF6jr0v9H+0lRGd9g2P91N1HOtgUTNg41YI8AOcFqvkZqdL2Q6hI2RiZKda7G9VSnyLq0Z+QJ/E182oeCjuV|r1f0J1Ol44mTpxhgrZIrs+n417ALuUbLe2/z3NtPru4=','PeopleSoft','DEV','Replication management across all regions','Replication management');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (119,'db2udb8','4t8Pt52w3zEQZDxM8GTioVx4K+ZwRBxHm+nBHNm8gnKPzueY7p0bNCIiqqaF2aUGwCOKKB6v/dBfIO3jyq8c1BDnZaxR78pRzpLG40ljuTmZ1DNSVAqXMJTX9ImTdQhr|jN5kIbRdpJ9CGFVr68xgO3S16gwjEHkkpIkZoKijgz8=','PeopleSoft','DEV','DB2 Admin ID','DB2 user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (120,'administrator','1cdRw1GWxa+KafuCgBC/YQoH3B2FoWpoDlvRM6Ek4WdUlYH/clic346nlRgIC2J/XQ9AVok+oCo+XjsWLsAjUVLO7gVybSljrM8wtL41GBVNuyR6AGeJML+5urH1TAxM|SzBWSQDeIABqh8+gO7w8j7QmHq6PWWHXvvQ9wi7ODv4=','PeopleSoft','DEV','NT Administrator for EMOps','NT Administrator');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (121,'Tuxedo','2tIKbtm830YFNxA8GKq07CNANji0MdW9JVOZk2p8ATC6jnduMJD8Dl9Uk42MwhSB0q9RQ/o5z109QrDqBZSNDkH6VSnn5MRU+w2jyhN+N9sr9B70aPHdQsXNyCXNSNsE|Wo1uwHdz5f4dk1oP5qt9JVgKXVop1F9uYzirQTlcHgI=','PeopleSoft','DEV','Tuxedo user on Unix','Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (122,'Windows server connect','zTD3QOIrA58cXbVVQOcnNOR9fgAMBsSKbWZ4ZKx4YYnwpD7OHaaiiKL+nr5a4qXd8k/vCxQvcRVT87RG7jhKSS6l5HArOeh6QV9bB29LncOnrD33pT5/OWVedWH5YIFo|PvT1UbdsN71aESAF6Nz38h/TDUTdw2nTtKKGVfBs0EI=','PeopleSoft','DEV','Public workstation access password','Public workstation');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (125,'Admin','gm+G7wWq0NyLKh9/tFlj44wLIkBKfXKUIhg1gKD8zTnq0mHAl7UZsHU8G8fIgnz+LsI3OkRwpzKda3e+ebqLLaM5Oa0NuRGnTNKsddMqiFxH8XAYE3tveODD6jnoGKp4|Dgs/nCwr9z62tT2majxPumyJmtOaiSkfyimHHzD7i0g=','PeopleSoft','DEV','CEL OVM Manager accessed via Oracle Secure Global Desktop Admin Console','Oracle Secure Global Desktop Admin');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (126,'db2inst1','yjEmLSTiZ/KGlIK8690n7Bj6pgB1jyKtitL+rWcAdSwbtQl1V/+v6ec2SfCVNwFbnW2PYsPcxYCEDrTdTm5geVz99vTWIhXwgNB/YuY00763r3fLXtLxHnpQwxx52CXU|p4lvyu5HRO0c4XXHEyIt/imVEZ5/1rz+M8TfKPWMWog=','PeopleSoft','DEV','Database Manager configuration','Database Manager configuration');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (127,'oracle','raioPSw8j9FTeR9gOvTOLHOIm7evYc6gzlwd9f8llLRXpencsRgocBafNBvmTzwG418/CgJG2Cm/Q4m54VnfnfYBMcfG5Mlm+h4cwYA0yKA/uK9tjLUDKQYoCln0jbBf|shJjJVoryz/9rmkfb06RJzd8c6QiOYe0kKpAOw4O69o=','PeopleSoft','DEV','Oracle connect on Windows','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (128,'Informix','r6LAxBBeA4czLLb7eBi+KLPABEVMvWgTMNVmPRMdUlBW/doMdDhnuHSsraqETYtfQmOTdeGeqHIQDycyd+UF3csBfBgzNVKt/4bwATAa8pL63zPkth8un3TVLrJoJh5J|MKks5CXHTXo7VH83SOJ2PehXLUeNSjqjQz9PTLi1cRU=','PeopleSoft','DEV','Admin ID for UNIX running Informix','Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (129,'administrator','0RH+ZKjklil2X7jlcbo6rdK0B8Gl4PBIxAqJSTih5e6dbsiu7+WOpKmJ+8dD28Fgo+wISwqtHyyIje8MXDwTkqAv2+6rFl6cXftDh5l0mLTKYOW+TtOPX2ua48XYadmd|6itNc5QwfBkpUxEd5cmWqZLZyrir8Az7i2eTaYfk/VY=','PeopleSoft','DEV','Local ID with admin access on NT servers in APAC','NT Administrator');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (130,'oracle','n1/ka+xWjaITwSOCdK1ZxPIZL1AQQnrKhgeaHVoZBH7KdMSZoUKfP85fFI5LPADBURDqPv1jeInrem2p+paoQfQyJI2oxtn+WX2gPGcIZ3XfCdxZrk9LKvu4EhBGsaI9|sEIDmItYeLfRXETu7o/pDLvFxuuaYhx4rFHKE0hnz8c=','PeopleSoft','DEV','oracle user on UNIX server','Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (131,'lroot','iH+rlRle9iyjJ7Q9OFdetoUa6fGpEDll4rHmYFd48XFZQavO2XLCuGpauliRdeZgyLS7nZ1nh/vCA73hZEHHA4BNQUXA1viZt2emol1yOAtlr8xYpuZTOeFHRFaV/LUu|q2KZkA9p+y/zfSImsjLGHocKweO4N5nnteacnAhqWBs=','PeopleSoft','DEV','Lroot access on our Unix and Linux servers to allow software installation.','Unix/Linux user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (134,'sybase','XnUjUwRr+Ru7bZu0ViGmm0MVMwN0SisPGeG+LK9uVKwvGjkpnY+2K2+Ym0/Q1rBKLR2sR1JIAz2dVv9bMtEBFkZarmXGslKptQzc/SigQFDFRsZ1jJwWrPAj0tM5wOdo|k8L0yRVJMpo/YXEg4ncqr+Q2FBFbXP4vKzk+t5e3gYE=','PeopleSoft','DEV','Admin ID for UNIX running Sybase','Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (83,'Emops234','CthpJR81qSoXKNKMuc1xfVCCGENiYX4FsdrcqFqVZc74k4pqNi5SkZXMPtWJOBcag1eD8xNPEKalzkeRgVKiX+hf4AwxgAuDredV/nTMyeaDmMgmT4A4iczFhm+umzkU|3jdAr7MgxAJRe8q+muLHGMos1lGd3u/cxNtlC8aU1/4=','PeopleSoft','OSS','VNC access password for IDC','VNC user id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (84,'EMOYANG','LbqcGzBj2yYC3hDfQPZWAlErgpxRF4l7odRvtD1uYjHKKJICzsz4NK9A3ZwIJW9BDWDv4rTGJ7BTm8ijQ2brRTBiv7G2U2VMgFykSV81hDYJmiuhPlD3egoWwxlyOXXe|ONCWoebDHb7kTxsz9MhtDw/AlA7+37LTKRZ/6tv+S8k=','PeopleSoft','OSS','generic user account','Generic id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (85,'Leave_it_blank','pYA2/76CoxuFp2IGqs3JrzZYqyZCDSrCjo/yK46uI5VXwuinvXWjwUKP2BF1OOCcCzZQxqhU4g/POBxgs/lne0qjsOdWFEggbU3J7Mv7jZ/xcsDGnL8oAPGzwBwCCy3t|Ognzn1Nz9XoDz4nrhJbwUCZk/orj/JhqiM3Fywi714w=','PeopleSoft','OSS','Software to connect to remote servers','remote access');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (86,'virtualpclock','oJDkdCO4ewma3+5WNqGoyZGIk8TFNnp6jBIKlIczBqGPn8mVcAQdlYosn/7/R699vyE4/DjneEyNj7VqCrnPov+7pcgxCxeEu2gDTEl2g1Nz6pSxFTHIo84p8N6+JSuS|LO4L4y1pfkock2z/BsAYgyKN+dDqeR5G5RNg9oYSbNw=','PeopleSoft','OSS','MS Active Directory on Exchange Server','MS active directory ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (87,'eqsys','J2goo+lq5jM2uXJ8WHg6r9yNIaZxHgTkQjC5xdcXJLv2YKj0xYB7P/IdrlDkna+iq/bhPhRkXxezXNB+9l41yUW6X4NP9oyN7itXP1PgUc1Rj34Ohm7AqS0g7sUffSma|XAZvgnlleUPtOYDLDWx8fKqOw6Sk5jNTCexqwmJyzbg=','PeopleSoft','OSS','Admin user for SES server install','admi for ses server install ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (88,'gcsvbtest','TyL0C99QKV10+wyLrft8kIYoikxS4Tj9h64OpFGa/f0B6u2EPT4QjyyC/n2pODfq7QvkXjfjdJQRs5VxjCDmcpqPBQg2tKEGSCWTU2VjarupFVtpcns8sDjXXEiEn7lL|0Wez1eaCCxC3izJQrqSLCduiddDvaKoSMy3jw2uChL4=','PeopleSoft','OSS','Admin access to server that hosts PUM OVA source files and environments','admin for PUM OVA');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (90,'people','GkvTDECFRx2RNkoNCe6yIftbVQbWeD3Kb/t3bFXPvjoDLLOEC1rVzNfKCzDQjzHU1iSuPwfFWzNXduK/o7PV+80r7bfdeBimCmIEfwXOtoN71tXzBW4r2ojFz+fG/QEH|GdvSNQ8HQ/OILonesBNoldqPEsx1TIHKi0mTgemSF7I=','PeopleSoft','OSS','User for PeopleSoft Connect Id on DB2 Windows','PeopleSoft connect ID for DB2');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (91,'sa','xsSci55NZRS9qVqTtDzKcxe5ottcXpne4/U88f/mLS4+xil+YO5dSF3GBkwguKcVfFB8VOQLRd3WoID0qAxfoGv3FDRz3ThpcLKZc0qEX5UEFh8hJmuo541NaxCpvSPa|tpedBUGkeC7vRHd6ewVzR/W74fH162QiYg8f/73euHs=','PeopleSoft','OSS','MSS administrator','MSS admin ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (92,'dba','WU6+TzETptuNrzE8tvWQIiUc/KRuNUGRm2Sao2/EUDg2B3DpcbUjJPPUaG2LMH2vWUlU8ueLES+fZGuuk35aItEy8QeS4Vc1sgZIt7rMsaYD5hO9LB37a3OLo7MSei+J|8IYo7vxlGXvNz/8GuLWCdOM+SgwAE/+AI4hCndUonmc=','PeopleSoft','OSS','Infosync dba on Windows','Infosync DBA ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (93,'administrator','xnjBL3BeyHDFaDzMtQtQ+4qc2c76nbbOLk6/VYXPPFjdlZh0P9uX9p6bdz/rr4eInZIszuDbY5f8K3rpY02pwA3cM+2CRZeifHZp07CFmGvVBvwZLuMKoQmJQy25Ic7r|OqAkdzAQqqBe5JGo/GGOZrBVOmAZQ6B/oSyHOnASq3A=','PeopleSoft','OSS','Integration Gateway Common testing for PT850','IB testing for PT850');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (94,'satst','xgQCuVO99HmTEtfqwC/FGQlkyvUGfIrnFPIMZh4kg03D8ILkIqRY2M5och51CdqA+P3urf+9QekgWYcns05tqMGj12KPELbehxSjFzHlVC2JAvRgBPhg6F4qvOLRYn28|bIviELuX0aB5G15y8FnQdJi6xubcjolWx8Gt7W/TVPE=','PeopleSoft','OSS','To Query MSS databases','sa clone id for MSS ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (95,'VP1','8AUWmZ67IwV8sC1/B/MC3k1RUssuEGzFWpQ/BlHuZ9GSaGiLXqEjcnuF5ayHJbNSIVe7PJickVCD5pXdklvjK8vxkfgLa7GYavtzkfwOGUqPlNPlSY2afXPYosTDzUsM|z3fTnIjW+Usraa7wNtR1FD5B49bEurD9MDZ6eeh4FCQ=','PeopleSoft','OSS','Customer Data Hub environment.','Customer data hub env ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (96,'emdbo','cmkpL/QT8q7bjeoEwCcVJDTZr2H/euifmbJ4TNG2Y9VIzYAAKXZojK76vJil2xaK07zL5ESkFrAUxbW0rKp59B63vpUQDqGWEyoODoqmH3gFsWpARVhW/X4hVxSjHlIa|FMS+AxAw7z4lhI0Zs3e8O11pewiCaKyor8jaEUHYg40=','PeopleSoft','OSS','Oracle/Linux database administrator','Oracle/Linux Admin ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (98,'IBUSER','GzDwh6m03RUuUI3lvCKOLhw9tjWYSLakUNmzgsbeWS+eDZshTBVj++Nz8PFlwAXv+6Eg00oGIjzRnsBXBph8YQtoF7G3yj4GO9nD27qpo+f1Dnu+hlL/5Yy9/6eJzKSB|Z2K/XZw/Ee+O2fLJQohRMGD3HdWrWK6e5urfh9Swh1c=','PeopleSoft','OSS','User to allow PIA node type in node definition. It is a clone of the super user from the application. PS or VP1:','PS/VP1 clone for node testing');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (99,'administrator','eoXKrCJrHQ5qM9FqJqK4fBUCGaneJGkKDwTab6Wx890S/8A2sbEWteL38R5D1F32/AnZgmwneVT0Fz+E9yro8sH/SsHjGgKAFgB4thHwEBTvN7UzSFovCit1w94Eecok|YDLLLz4E4PgUpzeLIE2QE+xpHjJf3nxzst7W/+5Lyzs=','PeopleSoft','OSS','COMMON_IBPOOL_ZXZX PT853','IB Pool ID for PT853');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (100,'administrator','irX25bA5thK7f3jSunCRnl8thzer35ExJ2URw++ML/PLNme/oGpe6Vru/tAGzClvmVZWjUlGe58KxP0Fmojocodan8BerdC5lkOgLqkeNM5oo8OGyMHPn1o/pyzTWNGn|YB0Hg9Xb3oZkCsdAMO4YaBnep6HlMvt7K7eYPsEq9qw=','PeopleSoft','OSS','PT8.53 Common Gateway for Secure Enterprise Search','IB Pool ID for PT853 -SES');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (101,'lroot','zKT7/M2VcwAetLD49GebMPn3wEM68Y7ObcFiDXSARfzMPfxuMdsmsxT460dKH6PB7CcBVBrhxz3DKrIjMlUs5BXWnCNSd7inYIrrPQuRT2jkPgjdmiWcsGcUv9VDLq0c|XXfyJhXA9QykIUtVyDMSJVMxj125x5e3gvl7vbA4TEE=','PeopleSoft','OSS','Hypervisor - OVM ARCHIVAL TESTING','Hypervisor testing ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (102,'PSDI','DMJq8kJEKt3M6N+sknyxl0sv43xzZcYyzGwPMBpsouPiLxRfxLiehSPqINOwI0rltNyvd6R7XrNW3T2Sa7CtKDom46iiRcpoxg1TemlHyxkrKIBGMnYK3ARfwf3laWqk|PaNDOm3a2k6pQay2N3pp08bvUuY3pZ1EIe/KIOeejDw=','PeopleSoft','OSS','Authenticate connectivity to MS Active Directory slc02vok','MS active directory ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (103,'e910g20e','+twGnsglgPpzmmWma59CUD2RN+evH22EyAp3yhmI4Z2Cod/Fq4Av/fH/k060akKGl2JLKDAzJrK1KImS8XXtW0orpv1BcDZ9IwWDAd+XLztgjHL4EIgO3L2hHn0Pk1q4|LZhS+BC46RCzbVo+BOjaqTCUT3jHj7EP9YR+1F9FYnc=','PeopleSoft','OSS','The user account password on Solaris 11 systems is not the same as the account ID','User id in Solaris 11 system');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (104,'system','VGcpsp8HnIyYkiUOhr3/ASfI6D5ZlYncBTsMBnTkhcwEjvQWEuDNPxclld6vyN9dkgrpcYINvn2Cmtgw3/UrQexyg0qXmF8wlGGzs6h0fV+1GA1CuwgZ9NPlhp342Rx3|wujqzUkw56loz9tTjscbp/+XiPvvBh1ctJKR5VCr0eE=','PeopleSoft','OSS','WebSphere console administrator login for CRM 9.1 OLM environment','Websphere console admin id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (105,'administrator','49LyRxXHBME6Ix26wEFk0eTtgD3CAFIDGM8A/tg4ObE0DfICdeZCzbZqq7HIfKSEzgnaSKpmGlh7l5zwnKTDLjIa06BxIpRdOBrwaZpKl030QcvjHHEycNXurjM2FY7Q|4khrJ/mCxwPH4uaSHVnexFt7EgTq1cJpe+t6Yyoq5Ns=','PeopleSoft','OSS','PT8.54 Common Gateway for Secure Enterprise Search','IB Pool ID for PT854 -SES');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (106,'administrator','h277mFVm1tim5Lsj2G9umg2S0MqUvEBrFgLkKPjLwBXiL76D7m9lXB5r36a4R9QcKHHh7VtnIz0e/OknAjeiIbyjrtq2H3jemYsxaTyb877b53b7pmUUFEX3qF9owlc5|+2X6oHnE18FR3zSCbUkPkwiUH8Ep5OXR7OqyBOjkZ30=','PeopleSoft','OSS','Common IBPool Gateway ontools 854','IB Pool for PT854');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (107,'weblogic','PTszGSV36iN0y4lCfe7Py3xJhVgVOFPpIDA8AWxV09YtOc5iaAADuA86sCpaHmb0E8mhNovkxKMxlRyexTyr5ebYp4uGneDBJ7XgRd0M1XC7Hwiy9ecFlhOKF4CsruvX|76vxXK6jhSMrkXuBi/gKXlnL9Kr5mg5mtWU8CkBpo6I=','PeopleSoft','OSS','Weblogic Enterprise Manager console for Mobile Inventory Framework','Weblogic admin id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (108,'system','KhEhz5Xu3rRwEz5XYua9KWUHKsD2wnmpsNBLKO48OqKKQSwMsE+1LTajlD2h23DT+zl9CDfCMRly65mtiLn7cLq3qzBHjHKr8Axgr00GhPmifAsHuM4RwtcivKBQw89f|h86+uvi6TjqF04wAgqx5cxjITNkOFIFThv4+eh3c/Hg=','PeopleSoft','OSS','WebLogic Administrator Console',null);
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (1,'esadmin','ZvaMKE20qVMj91mHCks4C0UrtpDgC5S7TDB/C5TuHDEjWvtUpZVl9+O/idwWJ1PuXfg1ZLfb4zMOhU6ROmBz7aWPLtYmlw42aq25P+oyr8/rZPiin+E3PifPGkwFOcZo|tM2Yl8Kb5SCCAfpMDMKnENPsGzo66JAUjr8GRjrRzhI=','PeopleSoft','OSS','Elastic Search server administrator','elastic search id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (2,'PSAPP','KDu+b1W7nAQmqPAI7mGu7gmVSUVxOSp6v9bzf0NK8PlotcnUhk0mHMGp2fk1Es8nJji9tgVSqRVCgjz+5zgkvpq91ZFkVr0PjSbMTUSWSBVJlsTCh6jsvgZDTt9tMs9y|x8rLvhlZijEKNx0qT5ZEufxIi0bPF8qOQrxIJ1avEE4=','PeopleSoft','OSS','Elastic Search callback user','Elastic Search callback user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (3,'emoss','YfOrwfzxptdHWN0NGEai585vKi860nsD5c78bB1+4jelecaPME8/mGsxM7UvlUvqWAP8d9R62WgHfiq45hxSCW+VYd2N4ImjxnCybsGE+cIbmIFPmF38zKACBWtw1Dww|90vbsNLkOuxa2dCXNRL8lUM9J2O//rsiaWuvJo4M1qA=','PeopleSoft','OSS','Non-SSO User ID and Password in EM DEVCC for Incident Rules and Notifications','non SSO id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (5,'sftpuser','Nach1Cx0fKTpno0KpE8N+Qd/UJvJFyGonaFyhIQcLrZDxTWK/ffYMuGAfcxZ5CFuxNsWK4wSZQhKGPq5tSZbECjQj6u6P1c1p73Eh0Kw0QHt3iujUFnyIgyExxbv83sm|c1QOttUkkbi+ehh47wvT2GyUSxRNADd9Qp4ie+P3lsA=','PeopleSoft','OSS','SFTP (FTPS) site on Windows','SFTP id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (6,'ruro','MOTakdxEXcMrMLEpnxdAiWzrqXlpLCetX1Vyr9bbiIF+JVcTnnjac6e6xsI+nXO4SBjhOu5ACHZ+LnEtrh8znRssSZrs8DJugkooyRXQVT/6c5WzGpKuJizcNOUK+9xC|kLfp60radx1VZ/gCST4O52K8KGwE7N+vZAxvhkwBcBQ=','PeopleSoft','QAE','This user ID has permission to select data from EMS tables','EMS user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (7,'qaeuser2','yCIlhMD6PrNfA47ICeNrO0bvY2S6WKb7Sy5EEcf2gxLnPyF6M04v0svfTFfGNLov+YFPleES6LVnjPdwtqYeNvDyrhe3vV9KRgAkzbQCiXC1Ho3Z8YVeIpCSHZt4Sa2D|g5NuZtltpgKsRD+58/N3xapHC186/2uy33hrPeXpTvs=','PeopleSoft','QAE','Windows service account for booting PSEMAgent, owner of PS_HOME and PS_APP_HOME','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (8,'psadm1','029SDaqLJqRtJIla3Mjm3bqMv/tzzO9dfg+qNSau9ChMDzjTDfZaT+TUUhoXnIDLakgLwZwqC0h5iwqX+q3XU728Z7uVZABtKNL0ElZiG67ePJcQIX+4VHNvOHsWF0Cw|w+Hh8DU4OW+LcvzTSwhk/mwrxLbDqAc5CgkmQ+82w3A=','PeopleSoft','QAE','OVM user','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (9,'psadm2','2AGvsfGpfrW8ddp4RY9YHy1w1mwwTcIaxs14rRHMj7hEKzOIRzm8YdKaSXruKphn79XSvZfzB53TcguVGMh2mEq0wPep3YGOc5tggTRFLhSiawvmCr7OI5i4QguAvnZT|Cs8JoeUHM/rMyfuhidnyGONIDcRMOHEiqGXqvmR8fXw=','PeopleSoft','QAE','OVM user','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (10,'psadm3','Ij2T3VTAwN7Bt9dfDLuxFX00SeNB+dIFE97QZnAoWSS0AdVqP+y6Vtyn0TU0BmAnDLefWR84MLXZZVxX9I62F2Lj5dBH0VDOAMkzY5ztZsBnwQ3aI4TE7E8xEttf7zvH|oX8bPGMf+uhFLiUd6xMwVcfRECxoq8qzFeAK4iQy9JQ=','PeopleSoft','QAE','OVM user','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (11,'oracle','maD3mUVReHcwBGgzfP6PC4OAHvoeGHFqpJ/ty1XdSbY7QdWmP5lHVckkjo16eHjMYdyDG1CwQnQ2Gmh4758+EO0hzsawzBymNpVw7Gf5cF+EZ38Zosxt7nYG47LtOave|ciSIYvDkkPozVLHBQj2BmGhsghXzbWMcmmiXzyvSuCY=','PeopleSoft','QAE','For SES servers login','SES user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (12,'virtualpclock','QzieG/AESAG9zPoS5l3L9J+HpUVja2lNLRxGYP2dtror7KmmOLj83IfF/E71ATZT+4B20q9Ncf2R9zt0xfORPsnSRfAvtTj7CRC5Hi1TFw8T3X7CEa52vIF+l+dFByvv|q+yGVolaDRZH8Ww3I9wvV43a021CVDa4vU75rkYEV/4=','PeopleSoft','QAE','Windows user for Active Directory','Active Directory user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (13,'weblogic','6Dl07oLF3+vJxYybgPQmjtNVCUzq4TZIIih7/+CxMVfJbk4d4LN58cJW8AqnhNfnmDDAfTHaYcv8I5ENzPCzcpgzDO4h4LaYuqSQzlsKp+HvERmH54zedrb6pUDLnFam|+1kg5cCAcd5p5xFUEiMuXgdlTjyBeLq2ANC0jWaV6UI=','PeopleSoft','QAE','For ADF console and EM access','ADF console');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (14,'dsadm','N5YycaNoxFIAjwRYXCeGV8aEGY+QUac7kVUc95RyAPBgDtTlbGd1AuW+EVDnr+/nvaAdJjbEk5IBk4yNCamF1UB7JmmnuDv+Z1nVvN1LZRXT7sv5CGqxLOxfI3E8lmst|U2+6Km7heURQ6j+l3IRLQotqDxzEaOyVnoEwlvozVlE=','PeopleSoft','QAE','For Datastage server login','Datastage user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (15,'lroot','Y+SXo1fMP4xPdH/DZiLXbQ0L+gyzEEeWLZ9NSmO1n+ffXIFfyE9/5rML+hdLvi5Jk9fr7VgCiA1+NdN8P29w/xwWBADLdUmyrBkipr6wo2fqGCGHTsD7nQElANWMrzX3|McOFc5mio/JdgH6iNFbUv2hkTE4V/y0ck+R/mQxSS3s=','PeopleSoft','QAE','Super user for Unix','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (16,'qaeuser1','cZfPGYZ0fHTVNRE6/VInTPHOb7yBbCEqqR1GeyhEbpy+IEt4YtYWVeop1g2EGKrGyFhUic059hUadUCaO/PZ1VvyvKDqQ5wc9nN2LE2CERNpu2YimJ3UDJCuqSRsw8wO|hN2SkOy60o8bYfvkUJRxuUQ2cbc75LZUxcZ0X84W9qs=','PeopleSoft','QAE','Generic Account for Dev,QA and OSS','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (17,'sybase','Jd8y73BcHFVUEAnRf0nSEZqKuIzwrXPXMJflnWDWcn90lmRxroqbQKIy5WZOifx3wb+pviLz/mj7/TGuCQvTvitRIaVyqIzf+P/E8m8Zig6f8nQV2jpy5YcB0U6yROXT|2boloSC+unyy2j7r17ex7uQglomSaxg+O73YGIOwtTE=','PeopleSoft','QAE','Standard sybase user login for Environments Team servers','Sybase user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (18,'informix','88a8x/iHw5KaHyNxJm45j4HGi2+PTT76U05QGwtD9ys6RUWknqi/ju7HaPffuUa5fsJ/gO/rOHchiZEjnnJc5ZjPDGwBFu0oFXoRgt8F7hpA7RRmYBgsjo1sInUiTS42|0erpQYTT9Rl+0YL6dnhA5BZ4JXT54d/ZO2v7H5tIeZk=','PeopleSoft','QAE','Standard informix user login for Environments Team servers','Informix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (19,'QAEHRA1','7V05YOizES0O6Wz4HB0CzXKozw/1j5sF/kGc06oqoq9z5u9dGXD2a2kXKnoqDIViWhghgxWTRzJOh4XCSWTshdE+6bj2PxMmZ02mmkZWrl6YJDxbosCTeiJHJWuQemXf|RdOa9L/wvmYMdZSvNCmmf7w04ZOC2k7YkIbHNQzklig=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (20,'QAEHRA2','fdqYjn7g6Jy0Szx0sMfg0DFkMUKM4SaHJEvYXamCj7ujGqoRkoY0Vq8nPgM+B0FNmsIgVuy1gKKimDelsm7V8z3zPB2A6u2WcVxXM+eJF1z2wH13ott2F9wjboJvSXcL|usqw2JoV3Ap8U56opwSmbpf5cN05fp8nwCvjzRWxM4Q=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (21,'QAEHRA3','3pIgFV4a5Elp1MODL/JM8XEZoryMYq0P00HQR+7Q2b/ytrNwdXjTfzBiHbucPMVMcvEcbV32jN640hALARDCqGb5TLHOV3Dm+9oAUVB5nb9XFBO4Iqo8eYwZFFmUzSsc|arnQkeezc6d0ocsenFvHeHl2IzPMlRLmDnGydQ6o3eM=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (22,'QAEHRA4','LsIRE/x3uKSFQoNaJnyJ9/FrCCT9l8NBbExxwlrk9v8WGAHw/gEEhv9TAPC4bjkLPJ8fpX7GX1q3iH0phstagUpjLevUG3ynfVlXsGllRKeIeFL5UeSB7MBHbIb4kHlN|aeajQMPYCP5n3GCVbFAINhLVlbktmFOz9ioDipCFiI4=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (23,'QAEHRB1','2tzcTMZdUpPCF0uCRp48QjForLiJTrEzWXfjpB8zZh4aVssKZGe/cLLwjXbx2yzzU4GPhF/G73YyMO1dLuH1xGdLclPVV0f6vw2RZbAhaol6x65+GKp3hP+1XPmOhlHO|rxnIbit7IVi7jCYQuVSlVtJ2JxBjw7AC0mblsZxEtAk=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (24,'QAEHRB2','sdV5GIb65Ej03obaMvcOvqgkDHuXLeGBOruV4g8oZYOaFhDJcX7Z94Ud3IIRUJzrZa3OUhskhS4YVgtJyJtsMk9TKBm34xubYN25t0jiMno3nZ2fWEtjrKjO6pKw9wHu|amn1kHgRjC22fRYtQaCoi0AWTr3lWvvxtlDuocYjB3U=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (25,'QAEHRB3','1VakvkfYffN9KJUWlWX6tng/1qVz0qi2UFt9Lv/bbjFO3hr2Qk1r0FCoa0pat9H+iAgokaeWmcK1rFbSk9nE4QRIZZhWRanQYziWzyqwi8Vwlj4KA6VqKIndLLTSzrEA|7cL9ooRUnU8wG2X0bh/RIJxfE1Dnzoeh8RsZBTcJtvg=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (26,'QAEHRB4','W5lRZNcGdlWG6+CFFAkRqUlfRM8K0k7bv21EiGVxX/2blDUoGk+jhFvyt/ftZrnCM0BJkLOV2RSywGZnB85i37eQTvBHLhRMhRQlepr8hCghqctyUiofGXT1FhECmsBZ|/5MbpKY8Ow3OYRd6yqEJzQz4vZ3WGC39aoR6dWxCHDU=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (27,'QAEHRC1','+9lqaT1csTYnv5O21yNTyKGfQRIlkhrrCoqvHBtWxA7/OpGhvOZ52c9D6WiXsIC3CMQ9FDORyoZt+25KBaS9kbYBCdpPelE1zm+2fDFzRyvnqLsSGP3amI+4XBldQ5+U|gQ2ngNp9tsskKk0g6+waBThXd3zjLoHpE9J0M0D/3XA=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (28,'QAEHRC2','WROl1CM2D2pTgCOTtylAhKK46VkWLnNNVKblFp5kKs4zViJT91m4dI6VVwNnkVraxruP7Q7xrqJqRPf6rbbG4vgH4ipfjJDx60UvZF0FEO1j8+9/o0VPsI/5ZC+eFRgT|puf3pqKsU5o79WkRMJaeSSCQAnTQbhnRM08DaDJ/Uqs=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (29,'QAEHRC3','m5Ndv6F28hGuaGBEF2Tly/hEvQi2KPtCx7ErrmWLY70mJe43MwUP13fifR6ojoPq3KuzOgZV6PSvmt9vW9P9ASEJ6vdqZukcX8duNHK4RdRBuPGuPX3+kRwXt06eH0o0|tCnwP20SD7CKNIQ2r/+WzQXwuJ5mwkpxwqDmn0q1dYc=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (30,'QAEHRC4','ukOkEiStYDf52Lo8z+X+QQSXZqesPB94H0uWjx8PTWr+P/FpVPb3G+OsV6gAwsijnwACuy1JIUddg5bghzwUIxb5qi5XIaSZC9f8bUgHt9kewoKUJ6t3B1NUZa9b1Kcz|3RCHc2fRgAYcpEZUNXiFKQERYV7VFmEtsd+Zk8A5K9w=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (31,'QAEHRD1','/4jtd2qphhaWjHwbkQXDv0VX2wGAIUYQuFX3wAPxO5tYt5bV4LAqBZQglZ1iF4aKWUL/S16I5MsClGO/KV0bST/fe0ob4wqQNPl/3umz8WXia4WiseqJdqCcZ9mijNDM|vUfFsqKMx31UWS0A614c7SjTiWz8qxm9F1WH994iuyk=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (32,'QAEHRD2','cxKHClJqw3wQe3rh2Xc052GAVx27TuvhJBC6DTxEdWt//16kaJ4BfiBtNKekGcS80rC5GnqJ8MWuLLhDk1NkXqqz9Ac79adk9MqXV1JCC+CXh3vvZLgPZyrJktgd65LL|ySILBErE+LxBafqCrhtAFuE4DVYQvnVX1/xRArEDcUc=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (33,'QAEHRD3','Dd62kiTjzAh05G/FYQ9AfsMGj2HxJ1qnvp31+MC8NTS4UOPj3Z4QQrBpVOyf02A5WqcztPB5BEsq6KoiWhFXQKTAmNf5i9nq8ikfuFcVEaPOduz2v8ZNi7gDFrgNgPb+|WvV7WFmLV0RZVP9nCMDhnvSlIE/VU599pCZIlcEo+8s=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (34,'QAEHRD4','XtgWLjt+SllJkufGd2991hzSMSLQPh+J47zlJ4KFtkzczXig6aOYRepG0dDqy1dMlxxnnOUQKUs2WfPO1/Ermih5FEmS6VcoxXYZt1YGKlyf35TZl1go8OrCB6G9f9pM|iXh+PjwhRTdkBvQkyjOBAPxJRUtCVx3oeFJ4nehhMCE=','PeopleSoft','QAE','Mainframe Autobuild ID','Mainframe user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (35,'sa','sLHaP4ub6OGNDUhRtihb4FSsRO0XZN2zCopxgJY6YZ+6wT2iID3IsL0xF0ZgS5RgqnSd62+4eOa/P+sfI7JOklvVMWIRSWLNaIEdp26vBoA9gO13JpR9ovE3tK/tQZcM|O3ThfEpzGLRbhYX+PysybarwwbZezq28W8f/xmDNM34=','PeopleSoft','QAE','Sybase Dataserver sa password','Sybase user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (36,'PSCNTL','PmXJKIZKjag9coSsZOOLitOmZsVdSZo7bg5EEoZyewbC+wmcepn81Y4k2k6461lKWBFFgtY3S361npu976PPxOTieOzi0GPAVKxnURvOSHXM/5QMtCrRW385GcoNpIyW|gaCxNBey4ug7xW6rf/9vEdJzgbGNvG2Dr3G8XzsNgjk=','PeopleSoft','QAE','For submitting PSLIST (LPAR) SO|SA PSOS390 management job','PSCNTL');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (37,'searchsys','0UUP9DEekJ7yQ6vYmbaisRJCkB9j/1zoOr7Wt6aDRvZN7lgVanj/ccBPe6Mim8CV0h5jNF/fD6+7sZgVyuHPUsQfpyUrYAZ8zATX7WAPvU0CPcmvQ6RXKS6+B5MucE+m|SpV3vkE1/ZMgtvnymmw6Ws+9CL6EDU94h0qe1T+sMNY=','PeopleSoft','OSS','Admin user for SES server install','Admin for SES ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (39,'EMMONUS','l2D6hnDfbQ7eP4DVPkWpGRFhlyB5vzxR0CFSMPsNCIncs+oilJvPyt+W9QhsLZ99ZYLggU4MSOxJ8qeMYdosESUseyvJMemC8EAjmBk9RKhJvktLr62rILNlIUQ75QTN|9eVzNyBW0RIIdH2hp4w4y9pU2eL+Us1BCLMiIPhgiMM=','PeopleSoft','OSS','Thsi user ID monitors NetApp filers and Sun storage devices. This ID has VIEW-only privileges in the EMGC repository.','netapp filers id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (40,'EMMONUS','uX9cln6+u+fUt1012wrCL5C2whCU/jrreokz4iwgJRaeNJNCj90JFyxRp6T2siamU3+2IvUwqjmru5LLxeVNLBus5rVqXMvKLl13Kuk/1ggHiPfji0c53/p5Adlb9r78|GZy2Go7vagfEwIZpfRs/QNDFd/TMFaXPIwQhx2tAc2c=','PeopleSoft','OSS','This user ID monitors Linux and Windows servers','netapp filers id ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (41,'EMSTGUS','3GG41HTJr8wdWSbiFXJ3ALMKhlWP9c6UK86PsR45WP45k5HrFkzaeDfD/AYy2e9sRWuf7pI3FxkmdAnvlNnR8jhFSJi8ZKclpHc461ZeZWn4wfQuKF0t7rXUkgFbkMnl|lTSamN5SrFmoro4SV3gEIIon32hWmqv29rU+CQpJVA8=','PeopleSoft','OSS','This user ID executes on demand RMAN backups','OEM id for staging team ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (42,'EMDBAUS','0qYpFEVZrY3Hd8j0o1JXPj2ukkvOWvP/RlnAE6iTBldJwP8NHa+TQ51cqFltzYsxllt+11DUCY/LgHFR+fgpJCVZ7QRBzbjO0GFJW42P/jCVBEA8fvMCyNeULjs0Wppt|z3sBDfyZ2Q2X6eCduFwmbblbW0DwHDpooT87M3Rl5l4=','PeopleSoft','OSS','This user ID manages scheduled and on demand RMAN backups','OEM id for DBA');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (43,'EBIZUXWW','yRjT/AGSQC0chjXpWa2/nKMe7gN/Vl1MulhcH6SbFwcIcfwtp4bMOhBEUTxGEvDEvT3raZU6fi/L4oB4uInwFNPUmou+2Q4p8KbxZwUFlf5u8GG6zgrETkILkzeqUB9n|8Hwuq2ETf3R0ENG65t1lqt55X15SznMu3WLDVeagpNg=','PeopleSoft','OSS','Authorized for end-to-end management of EM targets','User id for EM targets');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (45,'oracle','V3Q2iBJKHF3zClSMwlb6s8ejpYlpxjCqF6G3Lr1htQUhYKDZ5woEmbbu3uzDfaXTg9nMxCnVFVh1jX6pE8RehajgErlViEO9ZsA7w5JZK6aTvlm6aVX4zUbeHXVerfBl|jSj41xFxHtN266ktm4mUDa4qld848/7pUCMM6shR6Fs=','PeopleSoft','OSS','Standard oracle user login for Environments Team servers','common oracle user id for team');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (46,'sa','WXd1FqUPO1DXOpqfwf8Qe6M2WUq2lO2cSkuQUpDfMEjtbIKamjJuTjYabF+l0aECYYYU20q2xsie6gs1PisBkGj33Q551ggqA7ki0np8RdMMuAR8+HQp2UyXg+9AmOsR|QSpydZXWpiql6d9DoVbp1HD7eNF8gmtCVzruCgwbQ6s=','PeopleSoft','OSS','This is the administrator login for Microsoft SQL Server dbservers in QAE.','MSS admin ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (47,'oracle','bJi34O0TGOGU7wAbyHB2i1s8r4nz2ybTdf5+YVeQo979BQZ6lqNzdU8juL1RfD4GbEdt421hC7iWOF1LeEDYz7jXdpwRUvVH7Mxb4b+PeBKW2Nqd4inoVjY58+DMtcEE|7eqhx9xsgYCos8nDTZJY5P9HXwjZPtdp2Gege4kAcZo=','PeopleSoft','OSS','oracle UNIX user password for ssh into QAE','oracle unix for ssh ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (48,'informix','nG/LQOBoiVd4ADMJA3WqJp1Olnu0MbYtABn+drfNFRjcA+mjzFj4bHQQkxv7KZiMJ+969UCtXwGWT6KqNcZupLszQai19ut2ovxDtn7OQkAOBl0fJfepwpylu+xvcs3J|M92x9G7UFdEkH3FMmxsTuHGOXkO+5wf+k3vfgtnptoM=','PeopleSoft','OSS','Standard informix user login for Environments Team servers','informix standard id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (49,'lroot','pXIBjBLvGEcKhFUQ3/kTTsYsUH1YIN91lKI7ZF0fAdzHQ3tIcX1pg4+wmEvLVy0lq2ufitBcsSnP7swfGqvuYohtH+x06XhdYZb4oqBgHPhB6cI1HHWUSDk2fMx08vsq|OgMn1hzhEf2yiomvsdp8vDAGrF+b2sZWWzOu7yDgLxY=','PeopleSoft','OSS','Standard lroot user login for Environments Team servers','standard lroot access');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (50,'ruro','IV8yHEQeDR31B8PlB7nFQP/p0tuR2YtE1TcOl16kHv10f9HOYqUpk0WG5aO1slEOzb9e08AXYnzqcHfhlLtUrkUtDrch8ywWWGgHcf61dwZHsqDz1ibqhCVGwjZVZkQS|mr25JKSejWUh5aCphTPLPpkGFPgrvCbTZqFHp4Kf8Zc=','PeopleSoft','OSS','This user ID has permission to select data from EMS tables.','Admin priv user id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (52,'sa','NCvy4wz+btUxpKc6e109KWug/aQ87wP4t8XizjSsd7VbEpbpdzpG1sZQOdv1DvzOUxIhRtpEb5o6fElLmplurs7fNt6EN6qewATjXtk9TH5GZak1XGoYlx5MMOkAVMpb|oXUxfBCF/BZ3TRu2Dix5lSEV6LsJ4FkUVWOHohXM3dY=','PeopleSoft','OSS','MSS 2008 Administrator','MSS admin ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (53,'people','KEIB+ijRJPISusHdWjlAICzlhqwNZfyq05aDgVvDnid5offEc+yhHY4cVlV8oN3odJwL5L1LWMDKIYaWjvPqcE94bSNwqvOTBb8ErcJVG1imBaK1wbBOjLouUlEKf68E|Z5pmt4DQ1JJN+FBQHBnyJqy4A7+1Q9NqmpmU/mVY+0U=','PeopleSoft','OSS','DB2 -Used for PeopleSoft Coonnect if on DB2 Windows','DB2 connect id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (54,'sa','6y1//DlWjZhHfi6n9Z3p3M82BwCY4yQdGsOgK3cVP8sbM6jmKDeXAABE8R676idqwVarruqTbyr2+LWqyb8J4thilnxBTISf8XbFhWLZUowrtMlOK/QSNykwHwpvgKNc|QphL0x3C7YDMG2UbbkYg4kZ8ga3x9uUC58KJYtnXYKE=','PeopleSoft','OSS','MSS IDC Administrator','MSS IDC admin');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (381,'psadm1','mDrA19HKe0uHahUWspN3qFpSqhh/PmBEA5Zc6MpgH5z02lmQ+0G/IWNz1pfEekuoNEC6rQ0nQTwekgx0lKFjfREgBkxMpxA/wUvr5Rc5PiPfpjju/zOnPw2MFS32GGyw|83RKepOavh4Y8c4Jgmml+gLZ1yv7OVxVPTc9JEMeFa0=','PeopleSoft','DEV','Linux VM MT user to manage OOW environments','OOW Linux MT');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (135,'administrator','WPWSswN0XAgemr2DV3vx0sKSrh7t2JwNfj9IH18RZ5n1WhjEEMoekNm96p9Cv/988QLbLLwR9qjiqJtRgzC72hjMTHuKtJ2Ho1ZwsZvoDjOAjqzMRsyxwYG4aa/LBBHh|iGCeXZwWlLWY1yYOfTIdyGJaenEFyIms0wacDVlcZ4Y=','PeopleSoft','DEV','NT Admin for Asia Pacific (For Translations servers only)','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (136,'emgsclab','39IUzOn+H8ZTeYWJLSVEaxkN1JwUU0y5WqQl+Nh7sLBAzR80py+pNrSfAnSFwAy3NI15BU1Ls/h5wtYIT6mYdqfXNH2OslnJyeDahD8t4KYlFa65/VqzO+7uGvc/RHdB|agOJLoJf82KbxUvbm4KlfjY/Xv248QFZcjmfpfrMHzg=','PeopleSoft','DEV','Webserver installs on UNIX','Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (137,'Emops234','rnsppBIIg2b8o0RIyfine6oU13q0Xr3rqT3FzlfsEc7dGdPGnQeQ8/4X7HqwhcVErTnWRYuNnHXIBY7Jy6x+XsvY/aL+G07jJhbW501A6aCDZeVwTJaY+MfPLJSib144|AeJPl0jgnbCQhO5eMK5WO09O6ZWsjlY48hDsKifS6/s=','PeopleSoft','DEV','VNC access password for IDC','VNC User');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (138,'EMOYANG','UOM8RHe4TMhLvEeo09nA5RWb8Qk2VFLiMAnwE/ECrB9g48+ifI1ZFQWD1yQ6SLeNv6apNUjSQIWhc7yWS+MJkLANYPtDRYn+rFGMukiTtTCwQUx9ndlyuunB6WtnW+cK|XTh1G/sqKJIVSrXxjpIFzLU2fgNREDkfYhmNbYX2PyM=','PeopleSoft','DEV','generic user account','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (139,'Leave_it_blank','+VI2/mVoKzQbO7Q4qZaLJtjXGxShWQ01vsv9Z/EQovcT4gso5eBxj0fjhU8iFPSC40W+dMbdFZy6/2W8szbErQBKXr8AFvIOqyoKaj+KIanWdg8kDQuh3hs42KPJ0mDf|E4p5OGONDFRyVcYQtYH7+fcluSaAMayT5Tbsn7HjOZU=','PeopleSoft','DEV','Software to connect to remote servers','Generic Password');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (140,'virtualpclock','2sjIxmA+WPZEBstoBQ81QQpoyrbvM3i5iVCZXgAJ82ja0NfiHA51p8jBT2c1unhRkd6H1LCQBnk5qpHfvPkvwCOIFaiEUTlMXNvYojzBnzFRlxm5DQCtpIH5Z7MLKJa0|dxarBxKTiueV+rzYWBNoLIYqalNRwgPKAk/MguTRGr0=','PeopleSoft','DEV','MS Active Directory on Exchange Server','MS Active Directory');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (141,'/ds1/home/oracle/SES','3BFiLjIT3XYhneW+vcS5magPeeLFgT5ZnpSz83MrIr9DdxkFmjihwK9U19J1kR2N4gsnYFfUaWp+5JvQQZWXvYi42I87kz0UETjMkunrIDNa12wKlUECL38kpf1Qae3a|GqDKKq5pYKj4F2nIVlXRFQ0rKeHRAaXuCe7UYMNfGIQ=','PeopleSoft','DEV','Admin user for SES server install','Admin User');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (142,'gcsvbtest','JzfIiMMAxd0COu61/Jo/ytDeQ1onFqaJVx5Gm50FFjIuP6/o26oyiDDOGfST1vd59NCgwNRJDOfyJAzaLc5KaDG5ySkHniWfG6czwkN52yDC+Tp5e/wRcknRcA08EBSc|S2VGOujeSikduHUkcCaqQR9lUez6rmJriYIp4bB54n8=','PeopleSoft','DEV','Admin access to server that hosts PUM OVA source files and environments','PUM OVA admin user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (143,'slc00qcudom/virtualpclock','LcoV3GEndYxgok3J4/xzBJiPE02iXhu/dmxNyo8uRk66lJzOHRGKe3qQyKco3QdJS4Hi/dDJmh9Vdo9UELAh50UjXhc7ZVS8oNeJhWDkDEagDNbn+x5O3pylbSJhx83E|JLuGYZrWKafh7bo0ffaUu5+G5fRlxS6CjKwpheS3ems=','PeopleSoft','DEV','Standalone domain for slc00qcv is "slc00qcu"','LDAP user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (144,'em_cmdctr','TJz+WHPCtnlv2UVp77oxM56+l0lFW3ur7aV+tardB89oNocaJw91SRhM5PUWEuIi/4K6SMMF8q/v1MtWLbz8XxoIIZUjwFDY0UpcxzdobO5z1r4aZZMHxXAQus4Q6mld|sej/WRu1BHxywnCWe0ZifDFv01rMt06KcLrs70z9UOE=','PeopleSoft','DEV','Command Center server name is slc17lwe. Login under oradev domain. Run C:\PS\bat\endoutage.bat to enable ASOD for users.','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (145,'PSEM (After 1/12/2015)','OXZeod8U4+HJZ5u8jRVe1wiUr8kstxCn7zdMzIpMPNXkZGZHsaQM6FhaqaZSAR+uUVZXQU6S55Y+cWLj5EF8iJ9hr1HyyrZ7IiKmqw6VfW09aEoGBxY30T7U0Wo+pyIU|BHN1LWWSkmzDcbGJswBgjE1df0VfbSpywdcAmk5xi1w=','PeopleSoft','DEV','EntOps_EMOPS_EMDBA -- UserID for Build Database','Build DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (146,'EMMONUS','Ih1llPx0IthmJzitb70RjsPSBn6c9E3mtFqO+YMopoZvApJE7ZzuXtg1Uh4LnFRTfDz+4cSaDLNMIEYOPZj9jyJ+fRMk6JDMX4f8PWdEjoBSb1yqkBq+KruM6ivCRbhb|ll/TVlwOKEasHfQAXtowWcJYpKQ71TDG0frOx4HOf2U=','PeopleSoft','DEV','OEM - EMMONUS - DEVCC repository DBA Monitoring ID','DEVCC monitoring ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (148,'EMDBAUS','eRfMkcmXc0wyl8GkayeyuyIGw2QkSRr4jsZGgT9AjFfx47eclZTXI8NIYXqf62TSzOcYyWlN92P+tT5xV39HeUHOGHr4ZF+IM6yDBTq7l5WF6MTaQ8wOTA0nL+87Z6a3|tFUfoKVAWNq0vOOkivwR45b45xWO/a2dynNmnc31HPI=','PeopleSoft','DEV','OEM - EMDBAUS - DEVCC repository DBA Team ID','DEVCC monitoring ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (149,'administrator','HAhcQoPBZwiw/epCW0iSYGy5RZs8z9bhNZlthtCN4vnjR85m+fJLEGEzix1WtjL41Hd7vT+FdtpxUMhWC+LAMM/+cYcsqrNcJCkqIoLlVaqNPbOFXW//geVVOTfRVxwU|Ev0O8bPmnyuKZVtteSodfb3mzlvbAgKkzw0kQHA9jFY=','PeopleSoft','DEV','Integration Gateway Administrator Password','Integration Gateway Administrator user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (150,'PSEM (After 7/11/2014)','lbh9bgJrUihXlFEktnX1/BPKY9LzTiymkjZt+4RiR0Zd5/rAdZzW3OJXPWkPIA16sbIwi5b7zN01ol81IkEVCmS57YCVlpmEmtcraa8wEUTZkjXWw6M+pZborJLMk9ss|cgTeTRt7XVhh6pXjtv/gdUYNI8GlqLAiaJRgNH4vnIw=','PeopleSoft','DEV','PSEM password after 7/11/2014','PSEM user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (151,'administrator','oLgHJN1lpe0agznO6Lc9lzgF63EQaQ7e3qadMsqgCzrDf+BRhf6avNBpNnCypKYHMjuVZiZAfbkUhwHgA/hZWrVU6GWrCJwuiZ/0KBPUkUvdjdkQYAxaePhRt2kmPPAc|T3qAGTL3opDeygYAUYWOdHIpHkl3QDOHeN/llSFC6sE=','PeopleSoft','DEV','IB Pool gateway','IB Pool Gateway');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (152,'people','VeP3XMRGOvTEGeInn+V+YFDWvodMRAIq+88mbXOC5eJLmuatH3rtGsZ5y9cqG4Nd1hILD2Bx8jt9Mzc3s08rxS4VzJZUttLdwu1Brv3nCne1ivDf6zr58qFGrYS6BhXi|G4w692OKqvVyV1b5SXY/nJcR+6/9oOAA4gsvQ/siBcg=','PeopleSoft','DEV','User for PeopleSoft Connect Id','PeopleSoft Connect Id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (153,'people','cw3+m7TpxXdEWlgEFWb0L2S92k+qdYqOnSAQW7vtjIi3wsfGFNPqiRfRzqWYm3o/JTogDAhkA9VOXESVAWr6LGURAA5RdrYFBZDC+Z9HhNdK4YDP7vJ8Q3xhIwbmkjno|ypFvy75RgablUM3gXNKh8Rr5sWHhAIo041fxN0uHfWo=','PeopleSoft','DEV','User for PeopleSoft Connect Id on DB2 Windows','Connect Id on DB2 Windows');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (154,'sa','pmHqSK2WoCdx01Cx1FKXza3443MKEAqxGqg+E5tQwE58IQW9nGvVyZbxBIv2AcLy7mdRp+rywmRdsgOYLOnFH4KHdN/iUpMD3EJHbDkcjATT5TI3SrILw64HQ26aG38s|t8PeoPoIhAnyeCQKwN5qwDzBdHrcEgNu6LTAkPfFT3Y=','PeopleSoft','DEV','MSS administrator','MSS administrator');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (155,'dba','gr4YJow7JlnGOH90vYE+0r5v0S76rMNHb5x+Ia3vLilpEVsoHPBcT6TJ3QdeNTEYQxE4nHkfRivzTterhjoMHCVaiUT5kjkU1RoI6jaxBvITXF4J7F9mdM2D3NTeuRwR|EUBXCziBLyqpo9p30N4ntINB3dVaZXCPAX+4HDPWF6U=','PeopleSoft','DEV','Infosync dba on Windows','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (156,'administrator','7HohqUD0z6QWMH6e9SMFPgHbvcC3gErIWgEUxjVSdGw7tWexAT1xYzxvO6BmdsQwkU71Lj5148TJixSo06ywOo4tCvQXadzRn27e3CdEjFn9fqfke4mv7QDiK+VSlTu6|JcLlMyzqsC7iwIe6BPvXz7pePk9ebHOaLHL9Fbkb4ew=','PeopleSoft','DEV','Integration Gateway Common testing','Integration Gateway');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (157,'satst','PIiGXBKmRf7DIRh7oA8tAjuQ/t1Q050BsV6SByRkhkHYrnGaDAn9IYEMOqfm7cqsKa++bnAIpbo32ovMGtPXwUOyx4EvFN+SKZyvzgURhyz89mBl6o4ulJij/Y2gzEoA|lAB8GkMHN+0SnVE0QbANyjei9ji4mE4/1ldMcFhkwCU=','PeopleSoft','DEV','To Query MSS databases','MSS user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (158,'administrator','DQgxYnk10tFY/o+B1KFYekdusYr2/ycIP2hqF2Ewys7fBvtyWWvtRcI8N4cOWfTyPJUsrWmgicFjaUl56Pt06+iq3mhuMISy0tOA671REF1wkwjyZ9eBDeZZhiGGmk9N|vSOOUoIwOSsqXSduxfj/eXD5eeVn1xiBW9VVICs8Rb0=','PeopleSoft','DEV','PT8.53 Common Gateway for Secure Enterprise Search','PT8.53 Common Gateway');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (159,'ssh','+AYQlx8mxGFFV4TT4WqvWp2NB0KadVZz0nvNr25oDDlSX9BNbfjfCwdxdeyNA4cdWL6Pr3C7xrZHdVvB0GAvEtiS10tgOxjoEapLOeu1+gC5H4wEPXJ15In/7vlvWB9m|3Eo2SqFDXOnOiKqJ1TLRxK4lgHJhvW64wZRK0EPPlKQ=','PeopleSoft','DEV','Hypervisor - OVM ARCHIVAL TESTING','Hypervisor - OVM ARCHIVAL TESTING');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (160,'CN=Users','pI52DWsv2TBuxjHcM+DKcZxoaaJEq01/G98zVfOQ4lqOEc7j9uwUjSvm0+883shhB0s2cVSBrA3GFQKmJOh0dR+z9CHYZJir3zag5hY6IKA881gTZ5rztI3HNf6/zcoX|2QG3neMXPtlzUNbvoFQWycz9YPDlOvzSr/qPgOKa5UY=','PeopleSoft','DEV','Authenticate connectivity to MS Active Directory slc02vok','MS Active Directory');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (161,'Use Putty to connect to server','+xuL4uWkBXgUbqYzZqYI3dWgGV8sURK2lFTSdx54P/rbx1o+flQvwWU0zoLe/BFuQbgm0fTTbsp6ulcGHynQ1F51xEnSnEyO0u9utRHlYMb1nWe0T4IzkAthb3YujkBH|/FLQyhnkuQKPhIt1GZa2CTs69zq1OuRAHOnOEETWKRk=','PeopleSoft','DEV','The user account password on Solaris 11 systems is not the same as the account ID','Solaris user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (162,'system','U+7XvgDyOXsAfB+36P6Mv9crAwewjW0xXgjXGJG9uSA2TOyBi6jhua5xDnF9gPXtzjIZ3i5YUbPnEM7Pvlw1c//y2bs2t352XnZvWcoj9fEK5llmuM0dT1EEe7Ao+eFz|f+wBpHbzKX/ag0Klyuiq95QTdoMiv4ziYAB/pWx3nx4=','PeopleSoft','DEV','WebSphere console administrator login for CRM 9.1 OLM environment','WebSphere console administrator');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (163,'administrator','h/b1W0IrdimyMK47V7EhmV97O+zCYvaLzrgGGWkPwIOzJmJhXSSwYO4lRNRhI0E3UPYfm4OLJEp5LiRoeN/sl/R3GK7aATHm8HbyPXDuiGusjtH82jPbSySQuMjBflhN|P+4X+MHqeMXfqdZ/Yz/1jfE8Kdy2J29U+sMGx6ysy6c=','PeopleSoft','DEV','PT8.54 Common Gateway for Secure Enterprise Search','Common Gateway for SES');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (164,'administrator','ZfYPBlzQopY+5dSlOgN039m78/k7qEdvgsLy+E/NZSO2VWq0cyHtKyQqnbthKDbLaXulGIaZOs2LIbByv1A3lM4vBWbhBn3ly7xZtwEq6RixZVeMjBIRzwOr45GuDpnd|3kcJfZPSCnL0LUSNEhvLkhYahLoDGY0qU9+HkwJS8FY=','PeopleSoft','DEV','Common IBPool Gateway ontools 854','Common IBPool Gateway');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (165,'weblogic','6vjU4ApN6hhiXXH1Xd/08eZt9ecf8GKc+laQnohmkcX+rMudbB/LWjYIPZUuX60zxLocZ6U1L2dLBnJ58rbWR4Txj2OC0cuUXyngq9WQ+00/9ruzqI40dqmkmKBJONAg|i+eUVHAtooZIrBOB2Q2DCQ6/13aVAgPiEuv3jqYvOlg=','PeopleSoft','DEV','Weblogic Enterprise Manager console for Mobile Inventory Framework','Weblogic Enterprise Manager console');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (166,'system','qT6Kkw3Sv/DNAg3+1lAI6jQSmWRA69ZXxsYNKSdSpHUt6UAAo1tMBHNPG4wASuITFB021AXJoysNuiRa+lTEtx4TnH0Ir3gWiajkFEBRSQJptuuft4wFTwATmDA2JQSw|Rufl1ZUrzC/eXzA7IwiE13jGOq30gth3FYHKZpwCtYM=','PeopleSoft','DEV','WebLogic Administrator Console','WebLogic Administrator');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (167,'sysman','mDoCi2fnmzUfOu1iJab/Ye7zJSKSXdesbuC2ZBNvxdJUGyqYxeUxRm3nnK6TY2ba8s39//btKlZJvnfl9jYOPRM4iAOfsUBCzpKJrMvZr7qeggyokveyNEPyloAX1p8V|766JRq+RqR5ZNuyKK8TNqxStxCMT+wTq9bwQ9dCtne4=','PeopleSoft','DEV','PSEM agent and plug-in with WebLogic 10.3.6','PSEM agent ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (168,'SYSADM','5GVXVYSoQRod8svvYGk1FahcZlVsfZXRK+LTbyNNRIWoSua117OgEbsyZrGEAGffUY3WaXxcuRroO5WWvC5Iw++5lMgK5N6YgOzPTAa7xD1SNhZAgN8Hjl7keiKZocZw|a/VlQ9lwHX0trYqBTpEMHfM8Yxm4ZdbQPcqa4hbanqA=','PeopleSoft','DEV','Access ID and Password for PUM Source Environments that run on Oracle Virtual Box instances.','Access ID and Password for PUM Source');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (169,'administrator','Ms/IexwUwaj/XUAKTnjeR2ozIkTq5sDhNHlsg8hQfAIxnDrLy92qUPHqVuW+FyaB+vnIH25d5Ax3KdtUqN7jyTq7eDb6caNWPpYfqVWZNGEB4//XhFDkRLm7eQX/D+2w|eUq+nIYM1x1pAW7kEChLp6lJdmzxSncyoGm6T8ck+V4=','PeopleSoft','DEV','PT8.55 Common Gateway for Secure Enterprise Search','PT8.55 Common Gateway for SES');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (170,'administrator','EAgSjT+sxTtLZ+ZKJKuhWeAsiTDT2IvGugZncqjPBEXOKYmJNIpx3jnzZ3jjhrE0j93ocOVajHbD1vez+RWfVugWRFTMsr/APzmXRgFNl9RG/JG3W0KOH6GDevkslQCt|Kea/w6MjZ080+Ojxx0JDcBcyACstKrtsKNUVutyfikc=','PeopleSoft','DEV','FTP user private to the Team','FTP user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (171,'FTPUSER','LYBhaWX/xnh6D/XTP8GV1YRvnVkJDUX0zQGsCy0kxTrI3WmuGGH70qU+RxpTj+OFXjzmgf/vkEjW0GG5wI0smrQCajkmMoqwcRL39xAeRxv+PHEDaeVk7tpFBIZ3xO53|5UEAOeOk9aBFjJS/8QvK23HNFCvj7zqLnZHqtCZ/oH8=','PeopleSoft','DEV','FTP user for public usage including GCS analysts','FTP user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (172,'administrator','PFtP8ChUjyHzmlqzandcsHLsgGHjOyBYNP0LbwxLLXtV2OhFGiZ6Pi03TQuu3f79WybVC3EbsNrvMK4YrRtNUdgGRzRqpapOTwXFUOc07RXcLa9reBMNj09AczsgRO86|RlTG4y139LHk9jJECgVb6VTG3Col9pfk40AXj/4MsCQ=','PeopleSoft','DEV','DEP GW admin credential ','DEP GW admin credential');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (173,'EMDBO','mdibfIEPZZRyGWAa+i1cbSqiWgzMnHM7iS4BUgwCWfoRxZJslwB4R05rzr83VfhHjTjf5IG0yM3FpSgOfiyd5fS0pu2MbTniu3Yq/oMdrTfIp5EWvHmvqNE/HwrjG608|RN/kNxgIAoyxPXqyZVAlV03BzoIKXom8lSdn1h4CNVs=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For schema owner of EMREFRDB database','schema owner of EMREFRDB database');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (174,'oracle','XXfvypotQoToKdIrsv+21SpW4RoCtGCxydMiobFWEwd626vMJCBS/hp56NGIarWsPYnwbS/L+oebqmgNaLh7Gg1ORUZbu12MMnmtSJx/xaRNYP6aRGgEtVfdWdQ5eqtu|YT2bXBxZ0ix4tQ8ujn2tTyr+UJLrAkevGgrfAB7wgEs=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For ORACLE/Linux servers','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (175,'SYS','hxV01Pj9D1jVZCUu6bjp0KgmtsU5qPqH0L9tcB7Bw6q5xCJZ2QxPzllL4RK+Z1s4uzPuoWVvfpdgKDZb/OyrHiI2WvffaTeVW9CWqgUCdKQ0m/CkDImniXChdtW8zHev|3shK9f+WQ4NbJgT/WiAft9AdfntXiH2TEALlGx19s7I=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For ASOD-ORACLE DB',' ASOD-ORACLE DB');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (176,'EM_ASOD','UxD4FAdYh5PyRLTcdtJ+OxJfKrWYkRtR40t5kezY+7S2LkarmEw41yGyHyI6Awmcu5Z8QePBfSl0q38yM6cdsoqd61CP4qQCZKbSJF4w6guCN6AG+UNmo428iZZMkE+z|9ClMTMdiwrf6PW7RBesfeTvNtoDKab0zeFNmi2ngL4M=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For ASOD-ORACLE DB',' ASOD-ORACLE DB');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (177,'SYSTEM','9E2ZaB/YVkNClwHO/rabmUnzQXtnn7TetQTAGEPjmpmU+zvy2VhXem9TLAw2K3f7TGs5Sc42MyU6APeoSoEZxO/VhpqiiTVCKlXW9gec2OokBM45XDRHw1YgJczVhslP|UQLnG3knY/CuqpkgJsKjVrSM8FIcAxHlPRqyw6kWDbo=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For ASOD-ORACLE DB',' ASOD-ORACLE DB');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (179,'system','5fzPGTkhitRlKLgUEh/tHpgSVCS4hnDWaguZuRcD179goHV96KVpYU+MxNRg5dduTd+S36QbEeQwS5KLCztFCJJKCyt+qGhsfQDyR//FSdk7LucEDq250nT2418OgR+0|wZCbrjAn+H4bIeAHC4bseNivvHeHlbwW8k1yAi3mFl0=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- Weblogic console password on PT8.53-801 or above','Weblogic console');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (180,'PS','5xuPaoGvT3g/AvZno90M5w4lMI2KtcovxSz2aLSDU8sjMHJcEgqDMP2b67O6DsUCjn66vDJQ4aAU1hyeWckudvgkFzGfWQWHkI8eihnvyFSBcCrXSlKcITWnYwTjNdkf|0myUpIzZwc4LvauBDU4o+JnhWzGXnbn1P/v0Il9senA=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- DomainConnectPswd in psappsrv.cfg (PT8.53 or above)','DomainConnectPswd in psappsrv.cfg');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (181,'emmonus','mJEZD7l4MF1Lw4RARU0KY2TO6TW9hK3gLAa1P1ZE1brtXS3LvbE2ycbv3cXej/p2jwWc7zhkh4Qq3j5ZEGhuKibv7wmB62ianbdCjajAImtoYqVi9fmyfimDpbuSKAf2|qLDOPEOKY/mmlN0QO7npzCFmqhsbGtkc7QYO8b5Ist4=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For OEM Monitor User','OEM Monitor User');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (182,'emdbo','n7MfPVlLGJWkdA3t+qk9XLzSpROjPAKASsbV3RY69Wj2ww7t/712gVriPsfzyNXhzoY2urMkPU6tMUrJTG9Zzegax79H3f+Imk7VnczEBuPAHb+MguAdWx6wO4ZNEV+Y|JeJlGsDZc8hPIsrZL7C3tIzx3rT1RYK3Q9RocegRrEo=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on 9.2 and PS91853 MST databases','emdbo account');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (183,'emdbo','alCG4X71RImi1Hn6JyQ3YKRLzqDAkwnnag58ydZCveenEgPmtVQCZwGU3yG5GCOlhJF/TcI72Wla22B6sH6P1KjQxoWBL8Pjx5aH0ABgL64lhXew5nVtIbj+hXWbfLZS|pIPwk0AVvRjAev6gHK4HRagAslU9zkllq+gKXizNYjk=','PeopleSoft','DEV','emdbo password on MST database','MST DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (184,'emdbo','C9mEZvH5n/ix2y7Oc7Di8Mcni74Fgtek13CQClj2zvMd99HmlckX4cDe+Jvb1ve53jAJNvP34sE0eT+xlMl5dnYcIL3b4jDWYjKqTX1PXlWFBaPOg3qEGhazMtrv8bx+|63SF8TlMQW464c8DHcOIfK0vWC2joZUtIYy2lVbT8+w=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on 9.2 and PS91853 STG databases','STG DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (185,'emdbo','ZIe8C9EPSGKnnpz9qA0n/WD3mBf/He9yGrOKMPXir6vLPOa/z/N4IPXGxbWbq2tilQfi45PhcPyDt8e10WJEy5wd561zx9aNZHRx5ZkDxHav9KnmxVmojM71SjIjuI3Q|8hp3kt4UCnq5sr/e3wzf3u9vNvQnWGaeaiH8Y4z6VW0=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on all databases (excluding mst/stg)','DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (186,'PS/VP1','VWvZPPPXB0X3gVDHLRhhzIGStP6I0v8Am+ZiC6RsylNs5GM5c5mscXrXTF+uVzMPCP6dk5k5OaBM9OKVhYvTC2JqBHAnkZSt9/YeWWDZnnIByr2Nz/0IzY1dtSBEF7rF|fR7q8FHjPMIWbHMs5jACNdqRhKnEezCSonzOKy3deJc=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- PS/VP1 passwords on 9.2 translation for WPTG','Translation DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (187,'emdbo','reVutYDwuvWRJSAFG6V8WVVZ/ty5YITk8xV9kc68K/g32g3zRhF+CmezeiA533oey/4OvdDwJ2ZrpZdLFnqsfWa4UF0VDuVq0+Y7BMwiIZmVAspL/jGuJIWnHjZF6RPf|dPeTYTkAC9Tze/uH9WeXP+uotx4Z+SRQVCct0a8J6y8=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on 9.2 translation for WPTG','Translation DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (188,'VP1','5wV7y7W7co5JksUqUN/FM/WRoZk6MzE1RXdL+SixPjUTs1fqHvMKJa9aeEWwA6wyFFDPF43H2HRjhHYpxkqdnajkEPvHwV9+CK3B6F4/V6IoSSsr0S/zh6wXjwEVaxX3|AEZXD82vKmOqscvI3hOjoIiypbtNdd6xLWYqzfz02eo=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- VP1 password on 9.2 and PS91853 STG databases','PS91853 STG DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (189,'emdbo','KOjfRgyZv07NEV/hip0180Ul7f958/PkpNjOCWMUZTejcjQIo8WiDiDUyfOfVqYTA4Kuynum+XlKlpi/qJSWmPhkrMCeu0OUGQC6BQBKFmeAZApBga/ajSW8NVNUQh2Z|NN+1Vk4APtZtoBWPwt6le9bEx+NoKBYQEJFer30GPB0=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on HC920TST','HC920TST user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (190,'emdbo','+yQAEA9tNNFLAbJlIH8aoyaNvgpu8/exX0LC9yqn/TGUTul/IoLqkopJU7NkP2giQq3OkytVk+IBWDGtKnLQ76PDCtHEpwginqqxPJCNbkbh3fcHUTTd8eTvRGklAKjZ|VfVKD+/rJuV2s9zkXT/iIGFGhW1jc7RE6gddl/kEjTI=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- emdbo account password on 9.2 translation databases','Translation DB user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (191,'N/A','V1w69uA6Rthroqw55yoNlEl6qWVwhBzDfH+RdCDaDqZIekK8fhUyurxpHP4g479Jf95FYXOF1hsQE4OLl8WHXAW8B29jh7h6fco5I//hSUzigCsAXq/3cKWmg0V/HKop|6CBRgK+W996I+LNYGlGPFynMmBnGIAeeVYdLIgLFFI8=','PeopleSoft','DEV','EMOPS_EMDBA--pskeymanager password PT8.53 or above,user id will remain blank','Keystore Password');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (192,'PS','Ez8xmn5LEZ3VeF+W+pHukWRe5hI6dMXkQszG7sOkCvR5ZWw8kUxtm8UAK5ZBp+7aepmNcpf5xuLPDXbMfy13D1xrxWKfW5MhalUuMaX0oelbTb/3iPPzSrPKjk0BdIWF|+lPbwh0+6KAO+0/bLrIyOCXC73MamJY6TOe6E0/mOtY=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- PS password on 9.2 and PS91853 STG databases','PS91853 STG databases user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (193,'oemora','rNJKa58g8A5TiIwN7ifPb9YiU1Q8UUtsoTVvtDfwV6A5kpyLE0cmz+lBsLrfPCsBm6EmdlkUaEliVjh10f74wAQl4bRX7/jEHehGLmlpNjsPZDfJn6yOH8z9y3Zo4Kog|KMj7LnL0hs1wZw2Phr+FLeHYIYEHG3d/crMX7xH/yWY=','PeopleSoft','DEV','OEM Oracle id to logon to Linux server to configure/resync the local OEMAgent','OEM Oracle user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (194,'emqeous','8XLXJGM9afjvTJgm7sM/a60OqYe3CKYOowT5+t7VSZw42Ncx7FjkC/1ph+Djg4ZjhnCnioCJDRjm010yG7coANu38fPGVGgjHEWXUYxvVzqzr3ZDplt2JqHJB+BeerV2|kaFmkY14apwHQtpgVBE0wqB3h9d7nRT/urWgZDpv6OQ=','PeopleSoft','DEV','OEM - EMSTGUS - DEVCC repository QEI/ITO Team ID','QEI/ITO Team ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (195,'EMSTGUS','S8qAGynaqZxne8YTuEv4FEhfaUxphby+aN6pjpo2EADCEyGra2rvcGMChi8F2ksDhMq3/PNmTsglBfVCxDxqbq0DGmf1v+ALOE1u8jBKzhsEJxDtBtC225GJqyeuFkcs|ysMyyrtn9spX7+GuJJmmJEP2gXXDGpBUOn+woHJjzHA=','PeopleSoft','DEV','OEM - EMSTGUS - DEVCC repository EM_Staging Team ID','EM_Staging Team ID');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (196,'oradev\sql_admin','Ygi7AYC17scZvythfCHYCU+4mJKikiz5uE2oqb2mp96lie0wPRfBXVjFOxSqMtNOv+MqgFNNE6XoS4aWfTPe0G+cmC8fE6fa2L2LbJ9IgfK9LU5/etCK+AswUzXOX7AC|FmI9ZVRRBCBXF3h8vfbDoI5Bvv0MOGiRqsUUJsRoo7A=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For MS SQL server service start','MS SQL server service');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (197,'SQL_ADMIN','oLy5efI90wtTRb1tgyOjLn5vwYV6MVu3E+k020SIyPwDfwEd0keSjYi1xzGWHWuzoIM+//GDX+Szq/QmEiTCaVavjM7I+U5qIa7YdPX8CijHIORRrNkB/D3Qj0ajdjkE|R/jNDLLaPpI+ASJdBnAhLniI/WDBYQKzyPQv9Dzqq7E=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For MSS/Windows servers','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (198,'emadmin','iuuoLe5yBnTQ8TccQZVfn1HwdH8b0lmxxrwDt/zca0s+83Nzpf8rj1O5sgNuDDCKP2mDS7ts9Aovp6e/zOz9ZsdaphaDW/S8YjtTkUmNkdDYjpcEjOQSWp0AgzGLy+Lz|vcsf4QaJqjJEpaatcWKxzeDbk9bjZsHk/gAbwg+sZxI=','PeopleSoft','DEV','EnvOps_EMOPS_EMDBA -- For ORACLE/Linux servers','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (199,'EMMONUS','lQ0C0sonGnRCMSNNXLhls40HQgf971zq9MusqqcAEqlOADxZjQw9QrEhTb+5Dgmo7vuliAzbGg3dR2u2qpTQVaEfOUwwTuVJ7l2YOqpWgxkdiDcJEnbZgOVxEHqdiITf|qX2WbJdud3gxLKjBtOPbOzxlACsJoR3zE6XBvPVAfws=','PeopleSoft','DEV','Thsi user ID monitors NetApp filers and Sun storage devices. This ID has VIEW-only privileges in the EMGC repository.','NetApp filers and Sun storage device user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (201,'server','GEYXywoDODFKucAvGhhcGg4v6kVtcEpSd4b5jGVYNE7us3iM97i+8b+FTjVd8smGCASbV0VAMli1zHVPt9i9TdkuulhIV9CK7p0AqiPql6MB+kSb9+XuRXdkF+P8T6av|YKWQA/LXsekofU00q6tPVaZ3eFPvktnYyENdjxcPr+A=','PeopleSoft','DEV','Standalone Domain TPP servers for MS Exchange',' TPP servers for MS Exchange');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (202,'sybase','HvYB1yumeks863bBHJ+aA1GxvtHsnICkS96bXVYIeqam5rtf0ZojO1wCFxPtAdEUOpont/VvEUINGW90VJuEzFRkhgIVkrgl67QQZIN1TEqwNlXxXa6EydGsyRkb1IWP|tKc22Xft3hzsrSTxgvCqlnc0xTVbTiWBWJRGtVl+AVg=','PeopleSoft','DEV','Standard sybase user login for Environments Team servers','Sybase user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (203,'oracle','kjuNYuILHOLFSaaxo5N6/It1h6SAdclg+QLB/acr4VTePqyFqyOoOFKq1G3lKtw841iH1YRxD+syUM1eu8A9JacT8pVcvK9iY8JzbbMNBRy3AgkGEA538SXViX11aAAu|9E+NznLMl0Ihkcnx90a8aKn8rgp7KLMVCfR2PpMV7TM=','PeopleSoft','DEV','Standard oracle user login for Environments Team servers','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (204,'sa','FZ1zU3aHjtCMeSwnDdK/SmklQ6pox0e3X8HjPP91h5tanhZVaQOJSN33H02hObsRzdwXrxsecDygBz10FlE7O0ODGtxX9+EYGNpBcm/rFcwFQ7JDMDyF9/XLio0sEmpc|YDWFohn68GBPIxlp1Ys9PbteqbIT0tfyuCQzBIlkAgU=','PeopleSoft','DEV','This is the administrator login for Microsoft SQL Server dbservers in QAE.','Microsoft SQL Server user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (205,'oracle','ICfNPSqqdvRmXz6pE7MbMqY8MqSgvo0rYRXaEg3zoxhZRRlRwLrMBQU1yS/6tU6bU+YyQwk/80NPSNAJ2U33/0K8xdAdfmP43SjwsHn8vwUVdPKncB3wBPUtZlAaUKVJ|vIrGKB62/k/hGp9I5Jrm3RUR/99OXX17wCo1vL6k7nY=','PeopleSoft','DEV','oracle UNIX user password for ssh into QAE','oracle unix login');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (206,'informix','Sd2jujaf3sGVRopTkl0NeWg4yD6gu3XMKoUTkZ8JYoCVul9mlRLSKqA4RJHoUnQcxunEr3zxwSM4wrib6k5V6mzs1fpZkGfEO8BoQDQMnX+f9Pkn04Wo5dKGh8pbvI8j|RZIa+Y+1IS6HOmhlwxbXPChWuOD4onxuUVKz1BNnDPc=','PeopleSoft','DEV','Standard informix user login for Environments Team servers','Informix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (207,'lroot','UYqLQ5wXL+YqCLiyz1OlERA7aDU0ykhuHB2FKOEKGYHa2Y4wmavlk5X12mZ3nw4bHj08leTTU5tJo1LI8Q0Pn4zMFcEceEYBsXfeywas/cxTL78jUJhW0NSUjq5vo4ZO|oE40lRjTFr7kezN5aRxp0Pk4qiCDakrtv4t2MBe9gnE=','PeopleSoft','DEV','Standard lroot user login for Environments Team servers','Linux/Unix user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (208,'ruro','ICrC1irxx9XGP8jrGknbVe/IRbgIpWyDIz3tF5IJRPVhS3Io0G3lrwQheWqTXXr5UNl6mJ+6hwmlM1bO7qZdFFMNnamR+LQ3eD0E4PEDW9IJtXg+5qYaiTUInY4Z2j70|BmKElNG3Vx7/hNlFVewmGzsQViR7yyQvvSeDudF9DWM=','PeopleSoft','DEV','This user ID has permission to select data from EMS tables.','EMS user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (210,'qaeuser1','TwycUDpzbpHsWmv+ZRVgavO6qV7s7MFbVGxibiDbRXYm4zMoT0apc4ZMjlqibsrX+ImLizZcrWirDZQp2A1AZM5JjyGKFqeFz2bmh7vVNn6aHeaiA/asmErFBfwevM38|SEVJwBceTK4wcfXiPmY42OZMLCjhWU/remGQHsGPHiA=','PeopleSoft','DEV','qaeuser for windows','Windows user');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (211,'asoduser','dgLNsst+Jv1HHWT0nR5z7p+4Y3HvrOoPdGuX8U3QuUXf6uQy7ZIBIllBg6zDfBSEtoyR7m1bFQB6HPiEskNVPQhLRvhEpQHokNn1KciUtQOxd6GFtABR6Kzd9EKPJ5QM|wac5mrxAZcv3Wmp993n8lpGqEwQnIKcXtqs6Tcd7Ai0=','PeopleSoft','DEV','ASOD Admin user','ASOD');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (362,'emoying','LtoNtltY3LVXwSQ7QLXOOpRS15mzjQJDClGT2/RvDqDX1SGrN3yCGjchyxv+wXtkUfTggBTqsfPnpsxJ5GES/PS3o8XaqTRl9PqpZxz1IadzHpNDRE4JtS52OnIxVprO|yYHOrgUJyMjxOdHEkV4ePhkrTSD5EzOfyaGyvXc0CCs=','PeopleSoft','DEV','Generic Dev ID used for starting services','Generic Dev Id');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (321,'virtualpclock','Gwn9EWOZUIwWhIsS+8a+Aln9L6T3Abl7sxjnNbFORV/V92bMIAa0bX1aAXrjeNhobwvyCWfclSlSkMgZ5Zx7ISICzJSpXqDnq6jvsVhbS2j0fYl4D47E9O1YzasGmUTC|l5IcVSnnZ+e9dG1JHJX6tfmT94D6Ghm2Ik6xIieBbYE=','PeopleSoft','QAE','Exchange Server 2013','Mail Server');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (505,'dssauto','hmWegbubJOtQnmUmrnO5q8pj3sVg2qrCiLyE4dOuSea7cnSJtZmrfMMHm/GxS9A/ifxsVGA1ighP7107SC09NVePoCNWbMp0EKXvslLPPzkTkRrbQiplELak0/Q1Zo6s|4V+HTbj4H/I4hQgbKSVFxCZX6i36EKdhQbRIDGa7Ys0=','PeopleSoft','PROD','ProdSystemsDSSAUTO','Production Systems');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (382,'psadm2','4b0ifn2he2ESVr/j5v5qIp7TzolZFUfuGONurRb0na4wXNxccwYuN+7k53ueMOkz3z5hnxbrbaNgkVGCKFvYW4/wkGMvLzwYAJKuM82PGLmFAP1pRT0tv2A+Myq1DOtT|ofB9DMCBQhVsnk1Hci+Bqm7tUGFFfcX2dL5cxwl50F4=','PeopleSoft','DEV','Linux VM MT user to manage OOW environments','OOW Linux MT');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (383,'psadm3','RV0rswSktTBW8pNArJM9e0L6mhghWHqmSMlK0FX8SXEubGJnjX/VPUA+3h+mbeHgvUOA+d6ZUviulN5+NEsU86ZabPr9Ghs2z8vdTBfJasb3tBGeCt3eT7G7exfhsr9M|MgLxyGUBV0uZjIqM+3GDpeHkxIrGjiIJIHt93e204zE=','PeopleSoft','DEV','Linux VM MT user to manage OOW environments','OOW Linux MT');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (421,'manpm','rO+8P4D+UY79soIYa9ZNns0nxhz1ob05oMocOHw6YZJXUj+5GU4MFHEP5kMdW+mYOk13QRdi+AwQOxu/Ny+V7zk8hZkYFe2tuCst7uo79csulNQ7koNS6dqITcz0WbxS|foBWAKhCYnDh7NFZfb10cjflmMOn70MBTA+27Dsv73s=','PeopleSoft','DEV','hellosdddddddsfdffffffgfdgfg','deva');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (541,'dbsnmp','2fvurKJbFCb0yI7wMyuuPu/MDJ353n4wlBU5XwbeAJXhAnO7PvrRVwgQY0iPBaVtngkiFGxhNxG0zT7PFu30FEQGs1ZKZ7MTgo8RW/SEoGa7fY+9Gkw275z+ogF6+Vpy|vtgG5roNWOI0loQQgyTMXQCfK5Qb0lBuHG4WV8o5A+s=','PeopleSoft','DEV','Used to provide information for Oracle Enterprise Manager','Oracle rdbm software');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (542,'system','iUMu5WHavmwE9FHmltMHb+0ZZxZ4+3HcZxDTSoSIOlsksxmi7mkJQQxTzDyYu4foMPu9hqgoL2rDN8lCmVeVXQuOx/7XpRIgMT21o/5s5pS01GWYfW4iSdej4XbGGUpS|OtFO+kcDRmP1rlGHXncwkUikZ7UJWm/4RqQaTUqAUds=','PeopleSoft','DEV','system user password','Oracle rdbm software');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (561,'emdbaus','OyDpjqT8kNLMpYC3WdSH15t7Ptmw2M4UVklXxk3RyXH+noEPEW5pUUvF2n2FBW6jyRwv4fq41ozOMMLoUL04gpakw5Lg5tarxq1sWwc/jYqImXpgRsyAcevXXnolqUMA|q/n48J0oG7dHPTt6kuiN8pR9UNCr3yA+8AONDXPw5Es=','PeopleSoft','COMMON','sso based generic id for OITEM .Login as emdbaus_in@oracle.com','sso based generic id for OITEM');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (641,'mtadmin','ed7S2eIOHtpHs7tcA7IZmSEPNGy0hMShz1vgaDMqR1ecL8L4Bz13ZJUTYdO97UDPxB79SGrUvEzoGX8pjcGSVvPdWlPnMBTtL1rp+VwfFT89JJK4mhSwvrNZSqOz8O/f|le2dBmanE8JLKgixnwX/StHfsUh7ZoT3IKLmpVVyeBo=','PeopleSoft','COMMON','User that manages the MT template creation in both on-prem and OCI.','MT Template User');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (341,'RP-ENG_WW@ORACLE','63MxeZu0ZK3CaSmrNAv6aK8wBmZ2t5VHQeURcS2c7n5BidqNKzKWik+TMi8a4bDgUI0XrG3PYwsDQ4/Tpo22gnowBPatHkpPNqTPFiypDlpY0hPtlOi0fWg6qVD9RozX|+3DBu3RQ0A30nWNRFwFZDWeQOE/TA2PzMv6m/T9y8GA=','PeopleSoft','DEV','Generic Email Account','Generic Email Account');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (562,'emstgus','VNnGUflRlsRRpEqkPGOlK0lknOkYAY67G2jxu5mSuFTs7GEZSXUI4BBsAay+sdZ28saoWbt+jEGCzsNJpSskvGRbSu0gXfa/Zx+dILuk3pXDBWiUKwGWz4ctL9ZesyU+|vSymJVomkSEAqRsfRB7/eDAt2Fm3eGD9WPvD4DX/kS4=','PeopleSoft','COMMON','OITEM Generic Account for Staging Team to Run Backup/Refresh Jobs in OITEM. Login as emstgus_in@oracle.com','OITEM-DEVCC');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (462,'gdevops','jzjRUqJYT8Qywcf15uZnhWI4JVLnUSP4bpvhNJ6rDZGrLd166GlRY0SZPU0PvE/l2YyzaBw7sAiGaAtikffac01xdTvRlB57KOzfRcDFZQlKnGKrqeIlSbBgfGoPH97M|zh4EO1N6PHD6iwChAUNy+YBOe6H3i1tokBbcWW8x+PE=','PeopleSoft','COMMON','Generic devops linux user','Devops Generic Linux');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (281,'hcmgenuser5','hdhJ/0r2ZV/YFHeYQxhsQwkqcDN+RQajeWavpJqCKsRBMUJGB+r/mVrixpjPvK95w8EspU+Mes5Bef3/Is2YNI8PjMRtmpWY5zb9TRv7T7nXwW5gcKDqVZsB0opbmHPy|g8l+a6CZReCEQ3PLnasjPiUDlTOg35vxl1DBFHj9zq0=','PeopleSoft','COMMON','Web Console URL: http://ap6023fems.us.oracle.com:7791/ocsclient/. Each valid account has the same password. Full details are on https://confluence.oraclecorp.com/confluence/x/J_9hAQ','SMTP');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (301,'esuser','9op5Gq+zKGK3D58q2ZZvu6CWEiDW7G+oFC4nxSUVYxDCb5LKdUP7eXdNBXXIiwhAbdV1R0tJGY+j9EjonKBwePYohMflq35l18zG2O0tOsvBMu8f3UKgvRoXS7Po9qUV|vK6ag1bgmFJ0G9fQUqanJkQdUdjO1QHaJ6VeyJXGQ1g=','PeopleSoft','OSS','ES Admin password','Elastic Search');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (601,'Hypervisor-VNC','AfiZ4PBxP2VPmdhz5tRIc7OZNW8Bc6tFBhyr1933etVqD5Eo9iLIfb2PAgbbkNCvfweINVF+qkEdQHVqgydZlsjC1lnM2cza/DOK3zJdqtdGvoD4g5BS3rIpDtht10SN|DGqoa24++iGVP1bOyizkeIQ797fzvBF23zaWb448jSA=','PeopleSoft','COMMON','This is for VNC password in the HyperVisor ','Hypervisor ');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (461,'ovsroot','aVcPHWuEavcd4PZ65rZfP55Y1NmWAYoKm+0FdVoYX52K5ioDYyX2GA9/YnxCo0aDQBTjkQoWFw2KUaaZJ/9wm592ohE5f9lvswDMAISO3llAzJGjBeqcgtwakIp06H27|E++nynG3vD8m4to/y/s+xn6l/9hnVkw8GGb5uhDsmB4=','PeopleSoft','DEV','to login to hv as root','HV Manage root');
Insert into EMDBO.PASSWORD_LIST (ID,USERID,PASSWORD,GRP,SUBGRP,DESCRIPTION,COMPONENT) values (661,'pedadmin','K4u5068H4NqVQXumsKMr/2Pu3GZGbD2trXvAScO7eebjUROSh5wyI1FfbgticfQygp0W9LxT96gJ6SRwVKvPsPRxHWcCPW+DB7Fr7iO9DGXH0F3Api4DIOTYhVxHmk2k|i6C2fjvGwY1btilWIwP8XHNpO5tXXk8sL5JJJ0CzKsI=','PeopleSoft','COMMON','Use this url http://slc10ger.us.oracle.com/ped with adding a suffix to the userid as pedadmin@oracle.com','For accessing the PED System ');
REM INSERTING into EMDBO.USER_LIST
SET DEFINE OFF;
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','jitendra.chandrashekaramurthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','nirmal.chandrasekar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('C@rn!v0rou5','NA','NA','Y','Y','administrator.pms@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','Y','N','jacob.thomas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','jacob.thomas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','nirmal.chandrasekar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','sravana.sathyaveti@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','Y','N','nirmal.chandrasekar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','praveen.prasad@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','nirmal.chandrasekar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','jacob.thomas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','mane.barathy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','marti.masek@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','sagar.p@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','nagarjuna.kudhirilla@oracle.com ');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','manojkumar.srinivasreddy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','sravana.sathyaveti@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','chandra.karthik.av@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','chidambaranathan.narayanan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','srinivas.katta@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','praveen.prasad@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','manojkumar.srinivasreddy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','sagar.p@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','manoj.kumar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','chidambaranathan.narayanan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','chandra.karthik.av@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','nirmal.chandrasekar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','jones.isaac@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','sagar.p@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','tuan.au@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','tuan.au@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','hiroshi.nakamura@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','hiroshi.nakamura@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','manojkumar.srinivasreddy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','dominique.duchenne@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','dominique.duchenne@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','sourav.mitra@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','l.siva.sankar.nallam@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','mane.barathy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','manoj.kumar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','nitin.raj.srivastava@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','santosh.betagiri@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','subramanian.venkata@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','tapan.p.patel@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','srinivas.katta@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','subramanian.venkata@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','sravana.sathyaveti@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','jacob.thomas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','phillip.tafoya@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','weixuan.guan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','willie.jew@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','russ.kawaguchi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','l.siva.sankar.nallam@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','robert.judin@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','COMMON','Y','N','javeed.khan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','russ.kawaguchi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','russ.kawaguchi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','russ.kawaguchi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','feroze.abbas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','feroze.abbas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','hiroshi.nakamura@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','sourav.mitra@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','jacob.thomas@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','robert.judin@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','enrique.morales@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','COMMON','Y','N','russ.kawaguchi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','COMMON','Y','N','domenico.baudille@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','Common','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','elba.calderon@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','srini.botchu@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','srinivas.katta@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','alex.espinosa@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','sourav.mitra@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','edson.saab@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','bruce.sung@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','xuan.nhut.tran@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','robert.judin@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','robert.judin@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','Siebel','COMMON','Y','N','rajan.thampi@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','COMMON','Y','N','kevin.keith@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','kevin.keith@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','alex.espinosa@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','kevin.keith@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','kevin.keith@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','Siebel','COMMON','Y','N','kevin.keith@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','david.fang@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','david.fang@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','david.fang@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','david.fang@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','Siebel','COMMON','Y','N','david.fang@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','JD-Edwards','COMMON','Y','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','Siebel','COMMON','Y','N','vince.stewart@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','Siebel','COMMON','Y','N','denise.m.lee@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','Y','bhavesh.kumar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','elba.calderon@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','bruce.sung@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','xuan.nhut.tran@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','michael.taroli@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','benjamin.mock@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','benjamin.mock@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','benjamin.mock@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','mark.miyakado@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','mark.miyakado@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','mark.miyakado@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','matthew.taum@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','matthew.taum@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','matthew.taum@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','matthew.taum@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','tuan.au@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','tuan.au@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','Y','N','shanthi.krishnamoorthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','Y','N','shanthi.krishnamoorthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','Y','N','shanthi.krishnamoorthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','mayank.j.jain@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','venkatesan.thayumanavan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','venkatesan.thayumanavan@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','nitensu.nayak@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','kuldip.behal@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','nagarjuna.kudhirilla@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','nitensu.nayak@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','norman.nashiro@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','norman.nashiro@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','norman.nashiro@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','manaswini.pm@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','manaswini.pm@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','N','N','manaswini.pm@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','l.siva.sankar.nallam@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','srini.botchu@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','narmadha.uthiran@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','srini.botchu@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','enkata.ramana.ravipati@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','venkata.ramana.ravipati@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','naresh.k.kumar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','naresh.k.kumar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','nagarjuna.kudhirilla@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','N','N','nagarjuna.kudhirilla@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','DEV','N','N','veerayya.hawaldar@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','sourav.mitra@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','COMMON','Y','N','shanthi.krishnamoorthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','Y','N','benjamin.mock@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','QAE','N','N','hiroshi.nakamura@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','shanthi.krishnamoorthy@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','OSS','Y','N','benjamin.mock@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','N','N','tuan.au@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','N','N','matthew.taum@oracle.com');
Insert into EMDBO.USER_LIST (PASSWORD,GRP,SUBGROUP,ADMIN,SADMIN,EMAIL) values ('P@ssw0rd','PeopleSoft','PROD','N','N','hiroshi.nakamura@oracle.com');
--------------------------------------------------------
--  DDL for Index PASSWORD_LIST_UNIQUE
--------------------------------------------------------

  CREATE UNIQUE INDEX "EMDBO"."PASSWORD_LIST_UNIQUE" ON "EMDBO"."PASSWORD_LIST" ("USERID", "GRP", "SUBGRP", "DESCRIPTION") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "PSDEFAULT" ;
--------------------------------------------------------
--  DDL for Index ID_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "EMDBO"."ID_PK" ON "EMDBO"."PASSWORD_LIST" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "PSDEFAULT" ;
--------------------------------------------------------
--  DDL for Index DATA_UNIQUE
--------------------------------------------------------

  CREATE UNIQUE INDEX "EMDBO"."DATA_UNIQUE" ON "EMDBO"."USER_LIST" ("GRP", "SUBGROUP", "EMAIL") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index GRPSUBGRP_UNIQUE
--------------------------------------------------------

  CREATE UNIQUE INDEX "EMDBO"."GRPSUBGRP_UNIQUE" ON "EMDBO"."BASE" ("GRP", "SUBGRP") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  Constraints for Table EM_DB_LIST
--------------------------------------------------------

  ALTER TABLE "EMDBO"."EM_DB_LIST" ADD PRIMARY KEY ("DBNAME")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "EMREFRESHDB"  ENABLE;
  ALTER TABLE "EMDBO"."EM_DB_LIST" MODIFY ("LASTACCESSED" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_DB_LIST" MODIFY ("PSRELEASE" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_DB_LIST" MODIFY ("TOOLSREL" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_DB_LIST" MODIFY ("DBNAME" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table USER_LIST
--------------------------------------------------------

  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("SADMIN" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("ADMIN" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("SUBGROUP" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("GRP" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("PASSWORD" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."USER_LIST" ADD CONSTRAINT "DATA_UNIQUE" UNIQUE ("GRP", "SUBGROUP", "EMAIL")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "EMDBO"."USER_LIST" MODIFY ("EMAIL" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table PASSWORD_LIST
--------------------------------------------------------

  ALTER TABLE "EMDBO"."PASSWORD_LIST" ADD CONSTRAINT "PASSWORD_LIST_UNIQUE" UNIQUE ("USERID", "GRP", "SUBGRP", "DESCRIPTION")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "PSDEFAULT"  ENABLE;
  ALTER TABLE "EMDBO"."PASSWORD_LIST" ADD CONSTRAINT "ID_PK" PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "PSDEFAULT"  ENABLE;
--------------------------------------------------------
--  Constraints for Table EM_OPRDEFN_TBL
--------------------------------------------------------

  ALTER TABLE "EMDBO"."EM_OPRDEFN_TBL" ADD PRIMARY KEY ("DBNAME", "OPRID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "EMREFRESHDB"  ENABLE;
  ALTER TABLE "EMDBO"."EM_OPRDEFN_TBL" MODIFY ("DBO_ALIAS" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_OPRDEFN_TBL" MODIFY ("OPERPSWD" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_OPRDEFN_TBL" MODIFY ("OPRID" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."EM_OPRDEFN_TBL" MODIFY ("DBNAME" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table BASE
--------------------------------------------------------

  ALTER TABLE "EMDBO"."BASE" ADD CONSTRAINT "GRPSUBGRP_UNIQUE" UNIQUE ("GRP", "SUBGRP")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "EMDBO"."BASE" MODIFY ("SUBGRP" NOT NULL ENABLE);
  ALTER TABLE "EMDBO"."BASE" MODIFY ("GRP" NOT NULL ENABLE);
--------------------------------------------------------
--  DDL for Trigger ID_INSERT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "EMDBO"."ID_INSERT" 
before insert on password_list
for each row
begin
    select id_seq.nextval into :new.id from dual;
end;
/
ALTER TRIGGER "EMDBO"."ID_INSERT" ENABLE;


SELECT TABLESPACE_NAME, STATUS, CONTENTS FROM USER_TABLESPACES;


CREATE SEQUENCE  "EMDBO"."ID_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 711 CACHE 20 NOORDER  NOCYCLE  NOPARTITION ;

CREATE SEQUENCE "EMDBO"."ID_SEQ"
    INCREMENT BY 1
    START WITH 711
    MINVALUE 10
    MAXVALUE 9999999999999999999
    NOCYCLE
    CACHE 20;

SELECT 
    id_seq.NEXTVAL 
FROM 
    dual;

CREATE OR REPLACE EDITIONABLE TRIGGER "EMDBO"."ID_INSERT" 
before insert on password_list
for each row
begin
    select id_seq.nextval into :new.id from dual;
end;
/
ALTER TRIGGER "EMDBO"."ID_INSERT" ENABLE;
