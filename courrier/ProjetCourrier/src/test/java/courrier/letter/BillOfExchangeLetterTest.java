package courrier.letter;

import courrier.City;
import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.Money;
import courrier.letter.Letter;

public class BillOfExchangeLetterTest extends LetterTest {

	@Override
	public Letter<?> getTestedLetter() {
		City city = new City("Conakry");
		Inhabitant sender = new Inhabitant("Diallo", city, 3.5f);
		Inhabitant receiver = new Inhabitant("Abdoul", city, 3.5f);
		Content<Float> money = new Money<>(1.5f);
		Letter<Content<Float>> letter = new BillOfExchange<>(sender, receiver, money,"test");

		return letter;
	}

}
