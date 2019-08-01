<?php
/**
 * Customer install data
 *
 * @category  Roche
 * @package   Roche\Customer
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Koshyk\Customer\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Model\ResourceModel\Attribute as AttributeCustomerResource;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Eav\Model\Config;
use Magento\Eav\Api\AttributeRepositoryInterface;

/**
 * Class InstallData
 *
 * @package Roche\Customer\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Eav config
     *
     * @var Config
     */
    private $eavConfig;

    /**
     * Attribute resource
     *
     * @var AttributeCustomerResource
     */
    protected $attributeResource;

    /**
     * Attribute set factor
     *
     * @var AttributeSetFactory
     */
    protected $attributeSetFactory;

    /**
     * Attribute repository interface
     *
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;


    /**
     * Constructor InstallData
     *
     * @param EavSetupFactory           $eavSetupFactory
     * @param Config                    $eavConfig
     * @param AttributeCustomerResource $attributeResource
     * @param AttributeSetFactory       $attributeSetFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        AttributeCustomerResource $attributeResource,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     *  Add new customer attribute 'customer_company'
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Get default attribute set id for customer
        $attributeSetId = $this->eavConfig->getEntityType(Customer::ENTITY)->getDefaultAttributeSetId();

        // Get default group id for default customer attribute set
        $attributeGroupId = $this->attributeSetFactory->create()->getDefaultGroupId($attributeSetId);

        // Add custom customer attribute
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'people_check',
            [
                'type'           => 'text',
                'label'          => 'People Check',
                'input'          => 'text',
                'required'       => 0,
                'visible'        => 1,
                'sort_order'     => 50,
                'position'       => 50,
                'source'         => '',
                'validate_rules' => '',
                'system'         => 0,
                'user_defined'   => 1,
                'frontend_label' => 'People Check',
                'backend_model'  => ''
            ]
        );

        // Add custom customer attribute to attribute set
        $customerSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            $attributeSetId,
            $attributeGroupId,
            'people_check'
        );

        // Show the attribute in the following forms
        $attribute = $this
            ->eavConfig
            ->getAttribute(
                Customer::ENTITY,
                'people_check'
            )->addData(
                [
                    'used_in_forms' => [
                        'adminhtml_customer',
                        'adminhtml_checkout',
                        'customer_account_create',
                        'customer_account_edit'
                    ]
                ]
            );

        $this->attributeResource->save($attribute);

        $setup->endSetup();
    }
}
