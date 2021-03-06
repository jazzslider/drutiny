<?php

namespace Drutiny\Audit\Template;

use Drutiny\Audit;
use Drutiny\RemediableInterface;
use Drutiny\Sandbox\Sandbox;
use Drutiny\Annotation\Param;
use Drutiny\Annotation\Token;

/**
 * A template audit class to implement a real audit from.
 *
 * @Param(
 *  name = "foo",
 *  description = "A parameter that can be passed into the audit from the sandbox.",
 *  type = "string|array|integer|mixed",
 *  default = "bar"
 * )
 * @Token(
 *  name = "data",
 *  description = "An array that maybe used by a policy in the outcome messaging.",
 *  type = "array",
 *  default = {}
 * )
 */
class SampleRemediableAudit extends Audit implements RemediableInterface {

  protected function requireContext(Sandbox $sandbox)
  {
    // TODO: Check for pre-conditions of audits in here or remove.
    // Return TRUE if pre-conditions are meet, otherwise FALSE.
    // Any protected function prefixed with "require" will be run and must return
    // TRUE for the audit method to be fired.
    return TRUE;
  }

  public function audit(Sandbox $sandbox)
  {
    // Example usage of Parameters and Tokens.
    // See annotations in class doc block.
    $foo = $sandbox->getParameter('foo');
    $sandbox->setParameter('data', [$foo]);
    // TODO: Write audit.
    throw new \Exception("Audit needs to be created.");
  }

  public function remediate(Sandbox $sandbox)
  {
    // TODO: Conduct remediation work.
    return $this->audit($sandbox);
  }
}

 ?>
