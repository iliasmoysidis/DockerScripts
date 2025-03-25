using Microsoft.AspNetCore.Mvc;

namespace SampleBackend.Controllers;

[ApiController]
[Route("api/ping")]
public class PingPongController : ControllerBase
{
    [HttpGet(Name = "Ping")]
    [Produces("text/plain")]
    public ActionResult<string> Get()
    {
        return Content("pong", "text/plain");
    }
}
