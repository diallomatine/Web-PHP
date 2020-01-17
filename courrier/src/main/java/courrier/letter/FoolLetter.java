package courrier.letter;

import java.util.List;
import java.util.ArrayList;

import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.ListHabitants;
import courrier.content.Money;

public class FoolLetter<C extends Content<?>> extends Letter<C> {


	public FoolLetter(Inhabitant sender, Inhabitant receiver, C content, String nameLetter) {
		super(sender, receiver, content, nameLetter);
	}
	public FoolLetter() {
		super();
	}
	@Override
	public void action() {
		int nombreAleatoire =(int)(Math.random() * ((10 - 0) ));
		this.sendMoneyToListHabitants();
		((ListHabitants)this.getContent()).removeHabitant(0);
		((ListHabitants)this.getContent()).addHbts(this.receiver);
		for (int i=0;i < 10 ;i++ ) {
			this.receiver=this.receiver.getCity().getHabitantAlea();
			this.receiver.sendLetter(this);
		}
	}
	public void answer(){

	}
	/**
	*send the letters with money to 5 people in city
	*/
	public void sendMoneyToListHabitants(){
		Content<Float> money= new Money<>(5.0f);
		List<Inhabitant> l = new ArrayList<>(((ListHabitants)this.getContent()).getContent());
		for (Inhabitant h : l) {
			Letter<Content<Float>> letter = new BillOfExchange<>(this.receiver, h, money, "foolLetter");
			if (this.receiver.getAccount() > 5) {
				this.receiver.sendLetter(letter);
				this.receiver.debit(5.0f);
			}
		}
	}

	@Override
	public float getCost() {
		return 0;
	}
	@Override
	public String toString() {
		return "naifLetter";
	}

}
