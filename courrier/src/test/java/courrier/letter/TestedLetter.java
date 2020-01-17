package courrier.letter;

import courrier.content.Content;

//public class SimpleLetter<C extends Content<?>> extends Letter<C>
public class TestedLetter<C extends Content<?>> extends Letter<C> {
	Letter<?> containedLetter;
	int actionCounter;
	String name;

	public TestedLetter(Letter<?> letter) {
		super(letter.getSender(), letter.getRecipient(), (C)letter.getContent(), letter.getNameLetter());
		this.containedLetter=letter;
		this.actionCounter = 0;
	}
	public void action() {
		actionCounter ++;
		containedLetter.action();
	}

	public float getCost() {
		return containedLetter.getCost();
	}
	@Override
	public String toString() {
		return containedLetter.toString();
	}
	public String getNameLetter(){
		return "";
	}
}
