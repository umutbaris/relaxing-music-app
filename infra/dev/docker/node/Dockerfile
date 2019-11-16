FROM node:alpine

WORKDIR /app

COPY frontend/package.json .

RUN yarn install

COPY frontend/ .

EXPOSE 3000

CMD ["yarn", "start"]