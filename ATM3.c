/******************************************************************************

Welcome to GDB Online.
  GDB online is an online compiler and debugger tool for C, C++, Python, PHP, Ruby, 
  C#, OCaml, VB, Perl, Swift, Prolog, Javascript, Pascal, COBOL, HTML, CSS, JS
  Code, Compile, Run and Debug online from anywhere in world.

*******************************************************************************/
#include <stdio.h>

int main()
{
    int choice,bal=0,dep,draw,i=0,a[10],cnt;
    printf("\nWelcome to ID Bank");
    for(;;)
    {
    printf("\n\n1.Deposit \n2.Withdraw \n3.Balance Check \n4.Mini Statement\n");
    scanf("%d",&choice);
    switch(choice)
    {
        case 1:printf("\nHow much you want to deposit?: ");
               scanf("%d",&dep);
               bal=bal+dep;
               a[i]=dep;
               i++;
               printf("\nYou have deposited Rs%d",dep);
               printf("\nYour current balance = %d",bal);
               break;
        case 2:printf("\nHow much you want to withdraw?");
               scanf("%d",&draw);
               if(draw<=bal)
               {
               bal=bal-draw;
               a[i]=draw*(-1);
               i++;
               printf("\nYou have withdrawn Rs%d",draw);
               printf("\nYour current balance = %d",bal);
               break;
               }
               printf("\nInsufficient Balance !!!");
               break;
        case 3:printf("\nYour current balance = %d",bal);
               break;
        case 4:printf("\nMini Statement : ");
               for(i=0;i<10;i++)
               {
                   printf("\n%d",a[i]);
               }
               break;   
        default:printf("\nInvalid Choice");
               break;
    }
    printf("\nDo you want to continue banking ?");
    printf("\n1. Yes \n2. No");
    scanf("%d",&cnt);
    if(cnt==2)
    {
        printf("\nThank You for banking with us.");
        break;
    }
    }

    return 0;
}



