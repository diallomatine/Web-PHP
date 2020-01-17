package courrier.letter;
import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.Text;

public class SimpleLetter<C extends Content<?>> extends Letter<C> {
	protected final float cost = 0.5f;


	public SimpleLetter(Inhabitant sender, Inhabitant receiver, C content, String nameLetter) {
		super(sender, receiver, content, nameLetter);
	}
	public SimpleLetter() {
		super();
	}

	@Override
	public void action() {

	}

	@Override
	public float getCost() {
		return cost;
	}
	@Override
	public String toString() {
		return "";
	}


}
