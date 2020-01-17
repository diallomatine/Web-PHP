package courrier.letter;

import courrier.Inhabitant;
import courrier.content.Content;

public class AcknowledgementOfReceipt<C extends Content<?>> extends Letter<C> {
	public AcknowledgementOfReceipt(Inhabitant sender, Inhabitant receiver, C content, String nameLetter) {
		super(sender, receiver,  content, nameLetter);
	}

	@Override
	public void action() {

	}

	@Override
	public float getCost() {
		return 0;
	}

	@Override
	public String toString() {

		return "accuse reception ";
	}

}
