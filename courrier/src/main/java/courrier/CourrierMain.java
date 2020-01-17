package courrier;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import courrier.content.Content;
import courrier.content.Money;
import courrier.content.Text;
import courrier.content.ListHabitants;
import courrier.letter.BillOfExchange;
import courrier.letter.FoolLetter;
import courrier.letter.Letter;
import courrier.letter.RegisteredLetter;
import courrier.letter.SimpleLetter;
import courrier.letter.UrgentLetter;

/**
 * main class
 *
 */
public class CourrierMain
{
  public static void foolLetter(){
    City city = new City("Conakry");
    Inhabitant h0 = new Inhabitant("hab0",city,102.03f);
    Inhabitant h1 = new Inhabitant("hab1",city,112.03f);
    Inhabitant h2 = new Inhabitant("hab2",city,12.03f);
    Inhabitant h3= new Inhabitant("hab3",city,132.03f);
    Inhabitant h4= new Inhabitant("hab4",city,142.03f);
    // Content<String> content = new Text<>("Bien");

    //h0.receiveLetter(fool);
    List<Inhabitant> listHabitats = new ArrayList<>();
    listHabitats.add(h0);
    listHabitats.add(h1);
    listHabitats.add(h2);
    listHabitats.add(h3);
    listHabitats.add(h4);
    Content<?> content = new ListHabitants(listHabitats);

    Letter<?> fool = new FoolLetter<>(h0,h1,content,"fool");
    h0.receiveLetter(fool);
  }

  public static void main(String[] args) {



    City city = new City("Conakry");
    Map<String, Letter<?>> theCourriers = new HashMap<>();
    for (int i = 0; i < 20;  i++){
      float budget =(float)(Math.random() * ((200 - 0) ));
      Inhabitant h = new Inhabitant("hab"+i,city,budget);
      city.addHabitant(h);
    }
    Content<Float> money = new Money<>(12.0f);
    Content<String> text = new Text<>("Bla bla");

    Letter<Content<Float>> courrier0 = new BillOfExchange<>(city.getHabitantAlea(),city.getHabitantAlea(),money,"courrier0");
    Letter<Content<String>> courrier1 = new SimpleLetter<>(city.getHabitantAlea(),city.getHabitantAlea(),text,"courrier1");
    Letter<?> courrier2 = new RegisteredLetter(courrier0, "courrier2");
    Letter<?> courrier3 = new UrgentLetter(courrier1, "courrier3");

    System.out.println( "_____________________________________!\n" );
    System.out.println("jour 1\n");
    courrier0.getSender().sendLetter(courrier0);
    courrier1.getSender().sendLetter(courrier1);
    courrier2.getSender().sendLetter(courrier2);
    courrier3.getSender().sendLetter(courrier3);
    System.out.println( "\n_____________________________________!\n" );
    System.out.println("jour 2\n");
    city.distributeLetters();

    Letter<?> courrier4 = new BillOfExchange<>(city.getHabitantAlea(),city.getHabitantAlea(),money,"courrier4");
    Letter<?> courrier5 = new RegisteredLetter(courrier0, "courrier5");
    courrier4.getSender().sendLetter(courrier4);
    courrier5.getSender().sendLetter(courrier5);

    System.out.println( "\n_____________________________________!\n" );
    System.out.println("jour 3\n");
    city.distributeLetters();

    Letter<?> courrier6 = new SimpleLetter<>(city.getHabitantAlea(),city.getHabitantAlea(),text,"courrier6");
    Letter<?> courrier7 = new UrgentLetter(courrier5, "courrier7");
    courrier6.getSender().sendLetter(courrier6);
    courrier7.getSender().sendLetter(courrier7);

    System.out.println( "\n_____________________________________!\n" );
    System.out.println("jour 4\n");
    city.distributeLetters();

    Letter<?> courrier8 = new RegisteredLetter(courrier7, "courrier8");
    Letter<?> courrier9 = new UrgentLetter(courrier8, "courrier9");
    courrier8.getSender().sendLetter(courrier8);
    courrier9.getSender().sendLetter(courrier9);

    System.out.println( "\n_____________________________________!\n" );
    System.out.println("jour 5\n");
    city.distributeLetters();

    System.out.println( "\n_____________________________________!\n" );
    System.out.println("jour 6\n");
    city.distributeLetters();
  }

}
