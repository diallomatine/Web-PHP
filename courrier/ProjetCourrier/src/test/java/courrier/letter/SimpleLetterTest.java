package courrier.letter;



import courrier.City;
import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.Text;
import courrier.letter.Letter;


public class SimpleLetterTest extends LetterTest {

	@Override
	public Letter<?> getTestedLetter(){
		City city = new City("Conakry");
		Inhabitant sender = new Inhabitant("Diallo", city, (float)3.5);
		Inhabitant receiver = new Inhabitant("Abdoul", city, (float)3.5);
		Content<String> text = new Text<>("Coucou");
		Letter<Content<String>> letter = new SimpleLetter<>(sender, receiver, text,"test");
		return letter;
	}


}
