# scanner?

nur wenige sekunden, nachdem der Server oben war folgende Requests:

app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:02 +0000] "GET / HTTP/1.1" 200 479 "-" "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.824.0 Safari/535.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:03 +0000] "GET / HTTP/1.1" 200 479 "-" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/119.0"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:06 +0000] "GET / HTTP/1.1" 200 479 "-" "-"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:07 +0000] "GET /.git/config HTTP/1.1" 200 479 "-" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.136 Safari/537.36"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:09 +0000] "GET / HTTP/1.1" 200 479 "-" "Mozilla/5.0 (Linux; Android 6.0; HTC One M9 Build/MRA954696) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2420.98 Mobile Safari/537.3"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:09 +0000] "GET /.vscode/sftp.json HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:09 +0000] "GET /about HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:10 +0000] "GET /debug/default/view?panel=config HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:10 +0000] "GET /v2/_catalog HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:10 +0000] "GET /ecp/Current/exporttool/microsoft.exchange.ediscovery.exporttool.application HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | [Mon Nov 20 15:55:11.061288 2023] [authz_core:error] [pid 18] [client 172.27.0.2:47738] AH01630: client denied by server configuration: /var/www/html/public/server-status
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:11 +0000] "GET /server-status HTTP/1.1" 403 442 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:11 +0000] "GET /login.action HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:11 +0000] "GET /_all_dbs HTTP/1.1" 200 479 "-" "Mozilla/5.0 (l9scan/2.0.232323e2030323e26373e2434313; +https://leakix.net)"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:11 +0000] "GET /.DS_Store HTTP/1.1" 200 6354 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:12 +0000] "GET /css/.DS_Store HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:12 +0000] "GET /js/.DS_Store HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:12 +0000] "GET /.env HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:13 +0000] "GET /.git/config HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:13 +0000] "GET /s/232323e2030323e26373e2434313/_/;/META-INF/maven/com.atlassian.jira/jira-webapp-dist/pom.properties HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:13 +0000] "GET /config.json HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:14 +0000] "GET /telescope/requests HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:14 +0000] "GET /?rest_route=/wp/v2/users/ HTTP/1.1" 200 479 "-" "Go-http-client/1.1"
app_1    | 172.27.0.2 - - [20/Nov/2023:15:55:47 +0000] "HEAD / HTTP/1.1" 200 153 "-" "Go-http-client/1.1"sa