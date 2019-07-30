<?php
/**
 * Lebed Customer Setup Install Data
 *
 * @category  Lebed
 * @package   Lebed\Customer
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Customer\Setup;

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
 * @package Lebed\Customer\Setup
 */
class InstallData implements InstallDataInterface
{
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
     * AttributeRepositoryInterface
     *
     * @var AttributeRepositoryInterface
     */
    protected $attributeRepository;

    /**
     * Constructor InstallData
     *
     * @param EavSetupFactory              $eavSetupFactory
     * @param CustomerSetupFactory         $customerSetupFactory
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig,
        AttributeCustomerResource $attributeResource,
        AttributeSetFactory $attributeSetFactory,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
        $this->attributeSetFactory = $attributeSetFactory;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Install attribute 'customer_company_lebed'
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     *
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        //Remove incorect attribute
        $this->attributeRepository->deleteById(157);

        // Get default attribute set id for customer
        $attributeSetId = $this->eavConfig->getEntityType(Customer::ENTITY)->getDefaultAttributeSetId();

        // Get default group id for default customer attribute set
        $attributeGroupId = $this->attributeSetFactory->create()->getDefaultGroupId($attributeSetId);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'customer_company_lebed',
            [
                'type'           => 'text',
                'label'          => 'Company name Lebed label',
                'input'          => 'text',
                'required'       => 0,
                'visible'        => 1,
                'sort_order'     => 56,
                'position'       => 44,
                'source'         => '',
                'validate_rules' => '',
                'system'         => 0,
                'user_defined'   => 1,
                'frontend_label' => 'Company name Lebed frontend label',
                'backend_model'  => ''
            ]
        );

        // Add custom customer attribute to attribute set
        $customerSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            $attributeSetId,
            $attributeGroupId,
            'customer_company_lebed'
        );

        // Show the attribute in the following forms
        $attribute = $this
            ->eavConfig
            ->getAttribute(
                Customer::ENTITY,
                'customer_company_lebed'
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
