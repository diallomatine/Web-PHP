package courrier;

import courrier.letter.*;

public class Inhabitant {
  protected String name;
  protected City ville;
  protected float account;

  /**
   * Represnete un habitant avec ces caracteristiques
   * @param name le nom de l'habitant
   * @param ville la ville de l'habitant
   * @param account le compte bancaire de l'habitant
   */
  public Inhabitant(String name, City ville, float account) {
	  this.name = name;
	  this.ville=ville;
	  this.account=account;
  }
  public Inhabitant(){
    this.name = null;
	  this.ville=null;
	  this.account=0;
  }
  public float getAccount() {
	return account;
  }
  public String getName() {
	return name;
  }

  /**
   *this inhabiatnt send a letter to another one
   * @param letter
   */
  public void sendLetter(Letter<?> letter) {
    String res = ">>> "+letter.getSender().getName()+" envoie "+letter.getNameLetter()+" ";
    res+= letter.toString()+" (cout:"+letter.getCost()+") à ";
    res += letter.getRecipient().getName();
    System.out.println(res);
	  this.getCity().addLetter(letter);
	  this.debit(letter.getCost());
  }
  /**
   *
   * @return
  */
  public City getCity() {
	return this.ville;
  }
  /**
   *an inhabiatnt receive a letter
   * @param letter the letter to receive
  */
  public void receiveLetter(Letter<?> letter) {
    String res = letter.getNameLetter()+" "+ letter.toString() + " (cout:"+letter.getCost()+") de ";
    res += " [ "+letter.getContent().getContent()+"] envoyé par "+letter.getSender().getName();
    res += " reçu par " + letter.getRecipient().getName();
    System.out.println(res);
	  letter.action();
  }
  /**
   *Credite le compte bancaire d'un habitant du montant amont
   * @param amont the money to credit
  */
  public void credit(float amont) {
    this.account += amont;
  }
  /**
   *debit un habitant
   *@param amont le montant à debiter
  */
  public float debit(float amont) {
    this.account -= amont;
    return amont;
  }
}
