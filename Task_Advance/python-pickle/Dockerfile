FROM python:3.8.19-slim

RUN pip3 install flask -i https://pypi.tuna.tsinghua.edu.cn/simple
RUN mkdir /tmp/app
WORKDIR /tmp/app
COPY src /tmp/app
RUN touch /th1s_i5_Fla4ggggggggggggg && \
    chmod 766 /th1s_i5_Fla4ggggggggggggg

USER www-data
CMD sh -c "echo $FLAG > /th1s_i5_Fla4ggggggggggggg && export FLAG=not_flag && FLAG=not_flag && python3 /tmp/app/app.py"