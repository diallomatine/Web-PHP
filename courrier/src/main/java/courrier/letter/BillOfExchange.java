package courrier.letter;

import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.Text;

public class BillOfExchange<C extends Content<?>> extends Letter<C> {
	protected final float cost = 1;
	public BillOfExchange(Inhabitant sender, Inhabitant receiver, C content, String nameLetter) {
		super(sender, receiver, content, nameLetter);
	}

	@Override
	public void action() {
		this.receiver.credit(this.sender.debit((float)content.getContent()));
		Content<String> text = new Text<>("remerciement");
		this.receiver.credit((float)this.content.getContent());
		Letter<Content<String>> letter = new SimpleLetter<>(this.receiver, this.sender, text, "remerciement");
		this.receiver.sendLetter(letter);
	}

	@Override
	public float getCost() {
		return cost + (float)content.getContent()/100;
	}

	@Override
	public String toString() {
		return "de change ";
	}

}
