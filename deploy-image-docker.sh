# rm -R public/build/
if [ -d public/build/ ];
then
rm -R public/build/
fi
npm run build
docker build . -t  junioroliveira/escolhaazul:1.2.1
docker image push  junioroliveira/escolhaazul:1.2.1