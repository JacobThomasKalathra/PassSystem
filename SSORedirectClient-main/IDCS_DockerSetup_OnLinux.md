
## Stop Weblogic
	pms_weblogic/bin/stopWebLogic.sh

## Start Weblogic
	nohup pms_weblogic/bin/startWebLogic.sh &

## Start and Stop Docker Container during Patching
  docker stop appgateway_pms
  docker start appgateway_pms

## Weblogic Console 
    URL = https://phoenix138364.ad1.fusionappsdphx1.oraclevcn.com:5443/console
    UserName = weblogic
    Password = weblogic1


## PMS Prod : 
	https://phoenix138364.ad1.fusionappsdphx1.oraclevcn.com:4443/pms
    https://aepmssso.oraclecorp.com:4443/pms

## PMS Dev : 
	https://phoenix138364.ad1.fusionappsdphx1.oraclevcn.com:4443/pms_dev
    https://aepmssso.oraclecorp.com:4443/pms_dev



# Docker Setup

## Copy SSL Certificate
  scp aepmssso.oraclecorp.com.* gdevops@phoenix138364.ad1.fusionappsdphx1.oraclevcn.com:/scratch/idcs-appgateway/SSL_Cert/Oracle_CA

## login to phoenix138364.ad1.fusionappsdphx1.oraclevcn.com
  cd /scratch/idcs-appgateway/SSL_Cert/Oracle_CA
  cat aepmssso.oraclecorp.com.crt root_intermediate/DigiCert_latest.cer root_intermediate/DigiCert_Global_Root_CA.cer >aepmssso.oraclecorp.com.crt_import_consolidate.crt
  openssl pkcs12 -export -in aepmssso.oraclecorp.com.crt_import_consolidate.crt -inkey aepmssso.oraclecorp.com.key -name pmssslstore > pms_server.p12

    Provide password = weblogic1

  keytool -importkeystore -srckeystore pms_server.p12 -destkeystore store.keys -srcstoretype pkcs12 -alias pmssslstore

## ClientId and Secret details
  Request ID : 51541913
  Request For : IDCS App Gateway - Corp Internal Production
  Owner : jacob.thomas@oracle.com
  Application Name : phoenix138364
  Host : phoenix138364.ad1.fusionappsdphx1.oraclevcn.com
  Upstream Protocol : https
  Client ID : a387352b07f4477a8f0ff81d6b0f62c1
  Client Secret : 3408b707-97bc-4d5d-91a9-fe7d1f42f095



## Create cwallet.sso
  cd /scratch/idcs-appgateway
  env LD_LIBRARY_PATH=./lib ./cgwallettool --create --client-id a387352b07f4477a8f0ff81d6b0f62c1 --path /scratch/idcs-appgateway/SSL_Cert/wallet
  chmod 777 /scratch/idcs-appgateway/SSL_Cert/wallet/cwallet.sso


### Step-5
    Login with your NIS Account and run below commands
      >> sudo yum install docker-engine
      >> sudo systemctl start docker
      >> sudo /usr/sbin/usermod -a -G docker gdevops
      >> su – gdevops
      >> docker load -i /scratch/idcs-appgateway/appgateway-22.3.72-2207141354.tar.gz
      Run this command docker images
      This will display the downloaded docker image


### Configure appgate env file to point to staging or production environment

    >> cd /scratch/idcs-appgateway
    >> vim appgateway-env
    Add this information
        CG_APP_TENANT=idcs-9dc693e80d9b469480d7afe00e743931
        IDCS_INSTANCE_URL=https://idcs-9dc693e80d9b469480d7afe00e743931.identity.oraclecloud.com
        NGINX_DNS_RESOLVER=206.223.27.1 206.223.27.2
    Stage or Production Settings
      IDCS Stage 
      CG_APP_TENANT=idcs-25070016ce0c4eb8b6eea18f07fe170d
      IDCS_INSTANCE_URL=https://idcs-25070016ce0c4eb8b6eea18f07fe170d.identity.oraclecloud.com
      NGINX_DNS_RESOLVER=206.223.27.1 206.223.27.2

      IDCS Production
      CG_APP_TENANT=idcs-9dc693e80d9b469480d7afe00e743931
      IDCS_INSTANCE_URL=https://idcs-9dc693e80d9b469480d7afe00e743931.identity.oraclecloud.com
      NGINX_DNS_RESOLVER=206.223.27.1 206.223.27.2

## run docker container
  docker run -it -d --name appgateway_pms --env-file /scratch/idcs-appgateway/SSL_Cert/appgateway-env --env HOST_MACHINE=`hostname -f` --volume /scratch/idcs-appgateway/SSL_Cert/wallet/cwallet.sso:/usr/local/nginx/conf/cwallet.sso --net=host idcs/idcs-appgateway:22.3.72-2207141354


## Copy Certificate File

cd /scratch/idcs-appgateway/SSL_Cert
>> docker cp appgw.crt appgateway_pms:/scratch/docker/cloudgate/certs/appgw.crt  
>> docker cp appgw.key appgateway_pms:/scratch/docker/cloudgate/certs/appgw.key 
>> docker exec -it appgateway_pms bash
>> cd /usr/local/nginx/conf
>> nano cloudgate.config
        change discovery value from 3600 to 0 under caching section

>> cd /usr/local/nginx/conf/origin_conf
    nano backend.conf
    upstream phoenix138364.ad1.fusionappsdphx1.oraclevcn.com {
        server phoenix138364.ad1.fusionappsdphx1.oraclevcn.com:5443;
    }


## Start and Stop Docker Container during Patching
docker stop appgateway_pms
docker start appgateway_pms


### /scratch/idcs-appgateway/SSL_Cert/appgateway-env file content as below
CG_APP_TENANT=idcs-9dc693e80d9b469480d7afe00e743931
IDCS_INSTANCE_URL=https://idcs-9dc693e80d9b469480d7afe00e743931.identity.oraclecloud.com
NGINX_DNS_RESOLVER=206.223.27.1 206.223.27.2