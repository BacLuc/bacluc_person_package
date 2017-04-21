<?php
/**
 * Created by PhpStorm.
 * User: lucius
 * Date: 21.12.15
 * Time: 14:53
 */

namespace Concrete\Package\BaclucPersonPackage\Src;
use Concrete\Package\BasicTablePackage\Src\EntityGetterSetter;
use Concrete\Package\BasicTablePackage\Src\FieldTypes\DirectEditAssociatedEntityField;
use Concrete\Package\BasicTablePackage\Src\FieldTypes\DirectEditAssociatedEntityMultipleField;
use Concrete\Package\BasicTablePackage\Src\FieldTypes\DropdownLinkField;
use Concrete\Package\BasicTablePackage\Src\FieldTypes\DropdownMultilinkField;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Concrete\Package\BasicTablePackage\Src\FieldTypes\DateField;
use Concrete\Package\BasicTablePackage\Src\BaseEntity;

/*because of the hack with @DiscriminatorEntry Annotation, all Doctrine Annotations need to be
properly imported*/
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Concrete\Package\BasicTablePackage\Src\DiscriminatorEntry\DiscriminatorEntry;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Person
 * package Concrete\Package\BaclucPersonPackage\Src
 * @Entity
 *  @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorEntry( value = "Concrete\Package\BaclucPersonPackage\Src\Person")
 * @Table(name="bacluc_person")
 */
class Person extends BaseEntity
{
    use EntityGetterSetter;
    //dontchange
    public static $staticEntityfilterfunction; //that you have a filter that is only for this entity
    /**
     * @var int
     * @Id @Column(type="integer")
     * @GEneratedValue(strategy="AUTO")
     */
    protected $id;




    /**
     * @Column(type="string")
     */
    protected $scoutname;

    /**
     * @Column(type="string")
     */
    protected $surname;

    /**
     * @Column(type="string")
     */
    protected $middlename;

    /**
     * @Column(type="string")
     */
    protected $lastname;

    /**
     * @Column(type="date", nullable=true)
     */
    protected $birthdate;

    /**
     * @Column(type="boolean")
     */
    protected $public_picture_allowed;

    /**
     * @var Person[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\Person", inversedBy="Children")
     * @JoinTable(name="bacluc_parent_of",
     *     joinColumns={@JoinColumn(name="parent_id" , referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="child_id" , referencedColumnName="id")}
     *     )
     */
    protected $Parents;

    /**
     * @var Person[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\Person", mappedBy="Parents")
     *
     */
    protected $Children;


    /**
     * @var PostalAddress[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\PostalAddress")
     * @JoinTable(name="bacluc_person_postal_address",
     *     joinColumns={@JoinColumn(name="person_id" , referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="address_id" , referencedColumnName="id")}
     *     )
     */
    protected $PostalAddresses;


    /**
     * @var PhonenumberAddress[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\PhonenumberAddress")
     * @JoinTable(name="bacluc_person_phonenumber_address",
     *     joinColumns={@JoinColumn(name="person_id" , referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="address_id" , referencedColumnName="id")}
     *     )
     */
    protected $PhonenumberAddresses;


    /**
     * @var EmailAddress[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\EmailAddress")
     * @JoinTable(name="bacluc_person_email_address",
         joinColumns={@JoinColumn(name="person_id" , referencedColumnName="id")},
        inverseJoinColumns={@JoinColumn(name="address_id" , referencedColumnName="id")}
        )
     */
    protected $EmailAddresses;

    /**
     * @var Address[]
     * @ManyToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\Address")
     * @JoinTable(name="bacluc_person_address",
     *     joinColumns={@JoinColumn(name="person_id" , referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="address_id" , referencedColumnName="id")}
     *     )
     */
    protected $Addresses;



//
//    /**
//     * @var Note[]
//     * @OneToMany(targetEntity="Concrete\Package\BaclucPersonPackage\Src\Note", mappedBy="Person")
//     *
//     */
//    protected $Notes;



    public function __construct(){
        parent::__construct();
        if($this->Parents == null){
            $this->Parents = new ArrayCollection();
        }


        if($this->Children == null){
            $this->Children = new ArrayCollection();
        }

        if($this->PostalAddresses == null){
            $this->PostalAddresses = new ArrayCollection();
        }

        if($this->PhonenumberAddresses == null){
            $this->PhonenumberAddresses = new ArrayCollection();
        }

        if($this->EmailAddresses == null){
            $this->EmailAddresses = new ArrayCollection();
        }

        if($this->Addresses == null){
            $this->Addresses = new ArrayCollection();
        }



//        if($this->Notes == null){
//            $this->Notes = new ArrayCollection();
//        }
    }

    public function setDefaultFieldTypes()
    {
        parent::setDefaultFieldTypes(); // TODO: Change the autogenerated stub
        $this->fieldTypes['scoutname']->setLabel("Scoutname");
        $this->fieldTypes['surname']->setLabel("Surname");
        $this->fieldTypes['middlename']->setLabel("Middle Name");
        $this->fieldTypes['lastname']->setLabel("Lastname");
        $this->fieldTypes['birthdate']->setLabel("Birthdate");
        $this->fieldTypes['public_picture_allowed']->setLabel("Is it allowed to publish pictures of this Person?");
        $this->fieldTypes['public_picture_allowed']->setShowInTable(false);
        $this->fieldTypes['Parents']->setLabel("Parents");
        $this->fieldTypes['Children']->setLabel("Children");
        $this->fieldTypes['PostalAddresses']->setLabel("Postal Address");
        $this->fieldTypes['PhonenumberAddresses']->setLabel("Phone Numbers");
        $this->fieldTypes['EmailAddresses']->setLabel("Emails");
        $this->fieldTypes['Addresses']->setLabel("Other Addresses");







        /**
         * @var DropdownMultilinkField $addresses
         */
        $addresses = $this->fieldTypes['PostalAddresses'];
        $directEditField = new DirectEditAssociatedEntityMultipleField($addresses->getSQLFieldName(), "Postal Addresses", $addresses->getPostName());
        DropdownLinkField::copyLinkInfo($addresses,$directEditField);
        $this->fieldTypes['PostalAddresses']=$directEditField;

        /**
         * @var DropdownMultilinkField $addresses
         */
        $addresses = $this->fieldTypes['PhonenumberAddresses'];
        $directEditField = new DirectEditAssociatedEntityMultipleField($addresses->getSQLFieldName(), "Phone numbers", $addresses->getPostName());
        DropdownLinkField::copyLinkInfo($addresses,$directEditField);
        $this->fieldTypes['PhonenumberAddresses']=$directEditField;


        /**
         * @var DropdownMultilinkField $addresses
         */
        $addresses = $this->fieldTypes['EmailAddresses'];
        $directEditField = new DirectEditAssociatedEntityMultipleField($addresses->getSQLFieldName(), "Email Addresses", $addresses->getPostName());
        DropdownLinkField::copyLinkInfo($addresses,$directEditField);
        $this->fieldTypes['EmailAddresses']=$directEditField;

        /**
         * @var DropdownMultilinkField $addresses
         */
        $addresses = $this->fieldTypes['Addresses'];
        $directEditField = new DirectEditAssociatedEntityMultipleField($addresses->getSQLFieldName(), "Other Addresses", $addresses->getPostName());
        DropdownLinkField::copyLinkInfo($addresses,$directEditField);
        $this->fieldTypes['Addresses']=$directEditField;
    }


    public static function getDefaultGetDisplayStringFunction(){
        $function = function(Person $item){
            $dateField = new DateField("test", "test", "test");
            $returnString ="";
            if(strlen($item->scoutname)>0){
                $returnString.=$item->scoutname." ";
            }
            if(strlen($item->surname!=null)>0){
                $returnString.=$item->surname." ";
            }
            if(strlen($item->middlename!=null)){
                $returnString.=$item->middlename." ";
            }
            if(strlen($item->lastname!=null)){
                $returnString.=$item->lastname." ";
            }
            if($item->birthdate!=null){
                $dateField->setSQLValue($item->birthdate);
                $returnString.= " ".$dateField->getTableView();
            }
            return $returnString;
        };
        return $function;
    }




}