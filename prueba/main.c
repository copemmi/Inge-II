#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>

struct estudiante
{
char nombre[25];
char ape1[27];
char ape2[25];
float nota;
float media;



};


typedef struct _nodo
{
struct estudiante e;
struct _nodo *siguiente;
struct _nodo *anterior;


} nodillo;

typedef nodillo *nodoLista;
typedef nodillo *pNodo;
nodoLista lista=NULL;

void agregarEstudiante()
{
system("clear");
printf("                --------------------[Registrar Estudiantes]-------------------- \n\n\n");


struct estudiante est;
char nomb[25];
char ape1[25];
char ape2[25];
float nota;
float media;
int numeroEstudiantes;
int i;

printf("Cuantos estudiantes desea agregar\n");
int numeroCapturado=validaCadena();

if(numeroCapturado!=0)
{
system("clear");




for(i=0;i<numeroCapturado;i++)
{
printf("[");
printf("%d",i+1);
printf("] \n");
printf("[Nombre] \n");
scanf("%s",&nomb);

printf("[Primer apellido] \n");
scanf("%s",&ape1);

printf("[Segundo apellido] \n");
scanf("%s",&ape2);

printf("[Nota Obtenida] \n");
scanf("%f",&nota);

strcpy(est.nombre,nomb);
strcpy(est.ape1,ape1);
strcpy(est.ape2,ape2);
est.nota=nota;

Insertar(&lista,est);
system("clear");
}
printf("\n");

printf("Datos Guardados \n");
printf("ENTER para continuar \n");
getchar();
menu();

}
else
{
printf("Solo se admiten numeros enteros \n");
sleep(1);
agregarEstudiante();
}




}




void Insertar(nodoLista *lista,struct estudiante es)
 {
   pNodo nuevo, actual;

   /* Crear un nodo nuevo */
   nuevo = (pNodo)malloc(sizeof(nodillo));
nuevo->e=es;

   /* Colocamos actual en la primera posición de la lista */
   actual = *lista;
   if(actual!=NULL)
   {


   while(actual->anterior!=NULL)
   {
   actual = actual->anterior;
   }

}


   /* Si la lista está vacía o el primer miembro es mayor que el nuevo */
   if(!actual)
   {
      /* Añadimos la lista a continuación del nuevo nodo */
      nuevo->siguiente = actual;
      nuevo->anterior = NULL;
      if(actual)
      actual->anterior = nuevo;
      if(!*lista)
      *lista = nuevo;
   }

   else {
      /* Avanzamos hasta el último elemento o hasta que el siguiente tenga
         un valor mayor que v */
      while(actual->siguiente )
         actual = actual->siguiente;
      /* Insertamos el nuevo nodo después del nodo anterior */
      nuevo->siguiente = actual->siguiente;
      actual->siguiente = nuevo;
      nuevo->anterior = actual;
      if(nuevo->siguiente)
      nuevo->siguiente->anterior = nuevo;
   }


}



void MostrarLista(nodoLista lista)
{

   pNodo nodo = lista;
   int cantidad=0;
   char salir;

   if(!lista)

   printf("Lista vacía");


   nodo = lista;


      while(nodo->anterior)
      {

       nodo = nodo->anterior;
       }
      printf("----------LISTA DE ESTUDIANTES---------- \n\n");
      while(nodo)
      {
         printf("[");
         printf("%d",cantidad+1);
         printf("]\n");
         printf("------------------------- \n");
         printf("Nombre : %s", nodo->e.nombre);
         printf("\n------------------------- \n");
         printf("Apellido 1: %s",nodo->e.ape1);
         printf("\n------------------------- \n");
         printf("Apellido 2: %s",nodo->e.ape2);
         printf("\n------------------------- \n");
         printf("Nota Obtenida: %f",nodo->e.nota);
         printf("\n------------------------- \n");
         printf("\n\n");
         nodo = nodo->siguiente;
         cantidad++;

      }
getchar();
menu();

      //El de abajo es en orden descendente

   /*else {
      while(nodo->siguiente) nodo = nodo->siguiente;
      printf("Orden descendente: ");
      while(nodo) {
         printf("%d -> ", nodo->valor);
         nodo = nodo->anterior;
      }
   }
   */


}



int validaCadena()
{

static char buf[BUFSIZ];
char *punteroRevisador=0;
int n;

do
{
if(punteroRevisador!=0)
{


return 0;
}

fgets(buf,BUFSIZ,stdin);
n=strtol(buf,&punteroRevisador,10);




}
while(buf[0]=='\n' || *punteroRevisador!='\n');

return n;

}

int calcularMedia(nodoLista lista)
{

pNodo nodo = lista;
   int cantidad=0;
float media=0;
float notasTotal=0;

   if(!lista)

   printf("Lista vacía");





      while(nodo->anterior)
      {

       nodo = nodo->anterior;
       }

      while(nodo)
      {
        notasTotal+=nodo->e.nota;
         nodo = nodo->siguiente;

         cantidad++;

      }
      media=notasTotal/cantidad;
      printf("la media de los estudiantes es -> %f",media);
    printf("\n ENTER para continuar \n");
getchar();
menu();
return media;



}

void calcularNumeroAprobados(nodoLista lista)
{

pNodo nodo=lista;
int cantidad=0;
int aprobados=0;

 if(!lista)

   printf("Lista vacía");





      while(nodo->anterior)
      {

       nodo = nodo->anterior;
       }

      while(nodo)
      {

        if(nodo->e.nota>=70)
        {
        aprobados++;



        }
         nodo = nodo->siguiente;
         cantidad++;
      }

      printf("La cantidad de aprobados es: %d",aprobados);

      getchar();
      menu();



}

void calcularMayoresMedia(nodoLista lista)
{
system("clear");
pNodo nodo=lista;
int cantidad=0;
int superanMedia=0;

 if(!lista)

   printf("Lista vacía");





      while(nodo->anterior)
      {

       nodo = nodo->anterior;
       }

      while(nodo)
      {

        if(nodo->e.nota>60) //FALTA ESTO, METERLE EL VALOR DE LA MEDIA
        {


         printf("------------------------- \n");
         printf("Nombree : %s", nodo->e.nombre);
         printf("\n------------------------- \n");
         printf("Apellidos 1: %s",nodo->e.ape1);
         printf("\n------------------------- \n");
         printf("Apellido 2: %s",nodo->e.ape2);
         printf("\n------------------------- \n");
         printf("Nota Obtenida: %f",nodo->e.nota);
         printf("\n------------------------- \n");
         printf("\n\n");


        superanMedia++;





        }
         nodo = nodo->siguiente;
         cantidad++;
      }

      printf("el numero de alumnos que supera la media es : \n %d",superanMedia);

      getchar();
      menu();



}



void calcularMejoresPromedios(nodoLista lista)
{
system("clear");
pNodo nodo=lista;
int cantidad=0;

 printf("----------MEJORES RPOMEDIOS---------- \n\n");
 while(nodo->anterior)
   {
   nodo = nodo->anterior;
   }


      while(nodo)
      {


        if(nodo->e.nota>90)
        {






         printf("------------------------- \n");
         printf("Nombre : %s", nodo->e.nombre);
         printf("\n------------------------- \n");
         printf("Apellido 1: %s",nodo->e.ape1);
         printf("\n------------------------- \n");
         printf("Apellido 2: %s",nodo->e.ape2);
         printf("\n------------------------- \n");
         printf("Nota Obtenida: %f",nodo->e.nota);
         printf("\n------------------------- \n");
         printf("\n\n");








        }


             nodo = nodo->siguiente;




      }



getchar();

getchar();
menu();

}

void buscarEstudiante(nodoLista lista)
{
system("clear");
char cadena[25];
bool encontrada;



printf("Ingrese el nombre del estudiante: \n");
scanf("%s",cadena);

pNodo nodo=lista;






     /* while(nodo->anterior)
      {

       nodo = nodo->anterior;
       }*/
 while(nodo->anterior!=NULL)
   {
   nodo = nodo->anterior;
   }

      while(nodo&&encontrada!=true)
      {


        if(strcmp(nodo->e.nombre,cadena)==0)
        {
system("clear");
 printf("Estudiante Encontrado con éxito  \n");
 sleep(1);

printf("\n");

         printf("------------------------- \n");
         printf("Nombre : %s", nodo->e.nombre);
         printf("\n------------------------- \n");
         printf("Apellido 1: %s",nodo->e.ape1);
         printf("\n------------------------- \n");
         printf("Apellido 2: %s",nodo->e.ape2);
         printf("\n------------------------- \n");
         printf("Nota Obtenida: %f",nodo->e.nota);
         printf("\n------------------------- \n");
         printf("\n\n");
        encontrada=true;

        getchar();
        getchar();

menu();



        }
            else
            {

             nodo = nodo->siguiente;
            }



      }

if(encontrada!=true)
{
int op;
printf("Estudiante NO encontrado, Intente de nuevo\n");
printf("Toque CUALQUIER letra para reintentar | 0 para salir \n");
scanf("%d",&op);
getchar();
getchar();
if(op==0)
{

menu();
}
else
{
buscarEstudiante(lista);
}

}



}

void menu()
{

system("clear");


printf("[-----Registro de estudiantes-----] \n\n\n");
printf("1- [Añadir Estudiantes] \n");
printf("2- [Lista de estudiantes ] \n");
printf("3- [Buscar un Estudiante ] \n");
printf("4- [Media de calificaciones ] \n");
printf("5- [Cantidad de aprobados] \n");
printf("6- [Cantidad de alumnos que superan la media] \n");
printf("7- [Mejores promedios] \n");

int opcion=validaCadena();
/*nodoLista lista;*/

if(opcion!=0 && opcion<8)
{


switch(opcion)
{
case 1:
agregarEstudiante();
break;
case 2:
MostrarLista(lista);
break;

case 3:
buscarEstudiante(lista);
break;

case 4:
calcularMedia(lista);
break;
case 5: calcularNumeroAprobados(lista);
break;

case 6: calcularMayoresMedia(lista);
break;

case 7: calcularMejoresPromedios(lista);
break;



}


}
else
{




menu();





}







}

int main()
{
nodoLista lista;
pNodo p;
menu();
/*agregarEstudiante();*/












    return 0;

}
