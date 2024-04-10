FROM golang:1.19

WORKDIR /usr/src/app

COPY go.mod go.sum ./
RUN go env -w GO111MODULE=on && \
    go env -w GOPROXY=https://goproxy.cn,direct && \
    go mod download && go mod verify

COPY src ./src
COPY run.sh run.sh
RUN chmod +x run.sh && \
    mv run.sh /usr/local/bin/go-entrypoint

CMD ["go-entrypoint"]