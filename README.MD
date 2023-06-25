# yaf-reactPHP
```
yaf + reactPHP
```

### 安装
```
composer init
composer require react/react
```

### 版本
```
php 8.0+
reactPHP v1.3
yaf 3.3.5
```

##### 启动方式
```
php public/server.php
```

#### reactPHP
```
port=9501
host=0.0.0.0
```

### 说明
```
启用模块v1
配置文件conf/application.ini
路由文件routes/v1.php
```

### 性能对比

### reactPHP+yaf
```
Benchmarking 127.0.0.1 (be patient)
Completed 100 requests
Completed 200 requests
Completed 300 requests
Completed 400 requests
Completed 500 requests
Completed 600 requests
Completed 700 requests
Completed 800 requests
Completed 900 requests
Completed 1000 requests
Finished 1000 requests


Server Software:        ReactPHP/1
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          'hidden'
Document Length:        313 bytes

Concurrency Level:      100
Time taken for tests:   0.345 seconds
Complete requests:      1000
Failed requests:        976
   (Connect: 0, Receive: 0, Length: 976, Exceptions: 0)
Total transferred:      446270 bytes
HTML transferred:       317270 bytes
Requests per second:    2901.43 [#/sec] (mean)
Time per request:       34.466 [ms] (mean)
Time per request:       0.345 [ms] (mean, across all concurrent requests)
Transfer rate:          1264.47 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.9      0       4
Processing:     9   32   5.7     29      61
Waiting:        5   32   5.7     29      61
Total:         10   32   6.2     29      63

Percentage of the requests served within a certain time (ms)
  50%     29
  66%     34
  75%     34
  80%     36
  90%     39
  95%     43
  98%     56
  99%     60
 100%     63 (longest request)

```

### fpm + yaf
```
Benchmarking www.yaftest.com (be patient)
Completed 100 requests
Completed 200 requests
Completed 300 requests
Completed 400 requests
Completed 500 requests
Completed 600 requests
Completed 700 requests
Completed 800 requests
Completed 900 requests
Completed 1000 requests
Finished 1000 requests


Server Software:        nginx/1.23.1
Server Hostname:        'hidden'
Server Port:            80

Document Path:          /
Document Length:        1014 bytes

Concurrency Level:      100
Time taken for tests:   1.983 seconds
Complete requests:      1000
Failed requests:        947
   (Connect: 0, Receive: 0, Length: 947, Exceptions: 0)
Total transferred:      1165315 bytes
HTML transferred:       1003315 bytes
Requests per second:    504.39 [#/sec] (mean)
Time per request:       198.258 [ms] (mean)
Time per request:       1.983 [ms] (mean, across all concurrent requests)
Transfer rate:          574.00 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.5      0       3
Processing:    14  189  36.3    192     242
Waiting:       12  189  36.3    192     242
Total:         15  190  36.0    193     243

Percentage of the requests served within a certain time (ms)
  50%    193
  66%    212
  75%    217
  80%    219
  90%    224
  95%    228
  98%    229
  99%    232
 100%    243 (longest request)

```

### fpm原生php
```
Benchmarking 127.0.0.1 (be patient)
Completed 100 requests
Completed 200 requests
Completed 300 requests
Completed 400 requests
Completed 500 requests
Completed 600 requests
Completed 700 requests
Completed 800 requests
Completed 900 requests
Completed 1000 requests
Finished 1000 requests


Server Software:        nginx/1.23.1
Server Hostname:        127.0.0.1
Server Port:            80

Document Path:          'hidden'
Document Length:        16 bytes

Concurrency Level:      100
Time taken for tests:   1.427 seconds
Complete requests:      1000
Failed requests:        0
Non-2xx responses:      1000
Total transferred:      185000 bytes
HTML transferred:       16000 bytes
Requests per second:    700.71 [#/sec] (mean)
Time per request:       142.713 [ms] (mean)
Time per request:       1.427 [ms] (mean, across all concurrent requests)
Transfer rate:          126.59 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.6      0       3
Processing:    11  135  22.9    139     168
Waiting:        8  134  22.9    139     168
Total:         11  135  22.4    139     168

Percentage of the requests served within a certain time (ms)
  50%    139
  66%    142
  75%    143
  80%    144
  90%    148
  95%    151
  98%    153
  99%    156
 100%    168 (longest request)

```

