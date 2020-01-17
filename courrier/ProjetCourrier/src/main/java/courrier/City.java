package courrier;

import courrier.letter.*;
import java.util.ArrayList;
import java.util.List;

public class City {
	protected String name;
	protected List<Inhabitant> inhabitants;
	protected List<Letter<?>> mailbox;

	/**
	 * Construit une ville dont la liste des habitants est vide
	 * @param name le nom de la ville
	 */
	public City(String name) {
		this.name=name;
		this.inhabitants = new ArrayList<Inhabitant>();
		this.mailbox = new ArrayList<Letter<?>>();
	}
	/**
	*Ajoute une lettre dans la boite aux lettres
	*@param letter la lettre à ajouter
	*/
	public void addLetter(Letter<?> letter){
		this.mailbox.add(letter);
	}
	/**
	 *@param habitant the habitant to add i the city
	*/
	public void addHabitant(Inhabitant habitant) {
		this.inhabitants.add(habitant);
	}
	/**
	*Distribue toutes les lettres presentes dans la boite aux lettres
	*/
	public void distributeLetters(){
		List<Letter<?>> mailBag = new ArrayList<Letter<?>>(this.mailbox);
		for (Letter<?> letter : mailBag) {
			letter.getRecipient().receiveLetter(letter);
			this.mailbox.remove(letter);
		}
	}
	/**
	*get an inhabitat randomly
	*/
	public Inhabitant getHabitantAlea(){
		int nombreAleatoire =(int)(Math.random() * ((this.inhabitants.size() - 0) ));
		return this.inhabitants.get(nombreAleatoire);
	}
	/**
	 * return the mail box of this city
	 * @return he mail box of this city
	*/
	public List<Letter<?>> getMailBox() {
		return this.mailbox;
	}

}
